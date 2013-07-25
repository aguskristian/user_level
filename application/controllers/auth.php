<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	/* Simple Auth with Ion Auth Library
	  * Author: Toni Haryanto
	  * modification from controller auth.php from original resource https://github.com/benedmunds/CodeIgniter-Ion-Auth
	*/

	function __construct(){
		parent::__construct();
		
		/* muat library dan helper yang dibutuhkan */
		//$this->load->database(); library ini tidak perlu diload lagi karena sudah diload di model
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper(array('url', 'form'));
	}
	
	/* BERIKUT FUNGSI-FUNGSI UNTUK MENAMPILKAN HALAMAN 
	 * - function index() untuk menampilkan halaman beranda
	 * - function login() untuk menampilkan halaman login
	 * - function register() untuk menampilkan halaman registrasi
	 * - function forgot_password() untuk menampilkan halaman form lupa password
	 * - function user_page() untuk menampilkan halaman dengan role user
	 * - function admin_page() untuk menampilkan halaman dengan role administrator
	 * */
	
	public function index()
	{
		//apabila user sudah login,
		if ($this->ion_auth->logged_in())
		{
			//apabila user adalah admin
			if ($this->ion_auth->is_admin())
			{
				//redirect ke halaman login
				redirect('auth/admin_page');
			}
			else //apabila user biasa
			{
				//redirect ke halaman login
				redirect('auth/user_page');
			}
			
		}
		else //apabila belum login
		{
			$data['title'] = "Halaman Beranda";
			
			//memuat view beranda.php ke index array $data['content']
			$data['content'] = $this->load->view('beranda_v', null, true); 
			
			//menampilkan view template.php
			$this->load->view('template', $data);
		}
	}

	public function login()
	{
		//bila sudah login
		if ($this->ion_auth->logged_in())
		{
			//tidak perlu lagi mengakses halaman form login
			redirect('auth/index');
		}
		
		$data['title'] = "Halaman Login";
		
		//buat validasi input form login
		//validasi username wajib diisi dan bersih dari cross site scripting
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//validasi password wajib diisi
		$this->form_validation->set_rules('password', 'Password', 'required');

		//apabila validasi benar
		if ($this->form_validation->run() == true)
		{
			//cek apakah "remember me" dicentang
			$remember = (bool) $this->input->post('remember');

			//cek pada database, bila kombinasi username dan password benar
			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
			{
				//set pesan berhasil login pada session flashdata
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				//redirect ke halaman beranda untuk dirouting sesuai rolenya
				redirect('auth/index');
			}
			else //apabila login gagal
			{
				//set pesan error login pada session flashdata
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				
				//redirect kembali ke halaman login
				redirect('auth/login', 'refresh');
			}
		}
		else //apabila validasi form login salah atau belum diisi
		{
			//set flashdata untuk kesalahan input atau untuk pesan error sebelumnya
			$main['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//buat array untuk membuat field form
			$main['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$main['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);
			
			$data['content'] = $this->load->view('login_v', $main, true);
			$this->load->view('template', $data);
		}
	}
	
	function registrasi()
	{
		//apabila user sudah login, maka halaman register tidak dapat ditampilkan
		if ($this->ion_auth->logged_in())
		{
			redirect('auth/index');
		}

		$data['title'] = "Halaman Registrasi";
		
		//validasi form register
		//username wajib diisi, bersih dari cross site scripting dan minimal 4 karakter
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|min_length[4]');
		//alamat email wajib diisi dan sesuai dengan format email
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email');
		//nama depan wajib diisi dan bersih dari cross site scripting
		$this->form_validation->set_rules('first_name', 'Nama Depan', 'required|xss_clean');
		//nama belakang wajib diisi dan bersih dari cross site scripting
		$this->form_validation->set_rules('last_name', 'Nama Belakang', 'required|xss_clean');
		//nomor telepon wajib diisi dengan angka, bersih dari cross site scripting, rentang 7-12 karakter
		$this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|numeric|xss_clean|min_length[7]|max_length[12]');
		//nama perusahaan wajib diisi dan bersih dari cross site scripting
		$this->form_validation->set_rules('company', 'Perusahaan', 'required|xss_clean');
		//password wajib diisi, jumlah karakter lebih dari angka pengaturan min_password_length dan cocok dengan field password_confirm
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required');

		//apabila validasi benar
		if ($this->form_validation->run() == true)
		{
			//Field utama untuk autentikasi adalah username, email dan password, disimpan di table users
			//selain ketiga itu dikelompokkan ke additional data dan disimpan di table meta
			
			//post nilai untuk username, email dan password
			$username = $this->input->post('username', true);
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			//ini data tambahan untuk profil user
			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone')
			);
		}
		
		//apabila proses registrasi berhasil
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//redirect ke halaman depan dengan notifikasi untuk aktivasi
			$this->session->set_flashdata('message', "Akun telah dibuat. Silakan cek email Anda untuk aktivasi.");
			redirect('auth/login');
			
			//apabila akun langsung aktif tanpa perlu aktivasi via notifikasi email:
			//$this->session->set_flashdata('message', "Akun telah dibuat. Silakan login.");
			//redirect('auth/login');
		}
		else //apabila validasi salah atau membuka halaman pertama kali
		{
			//set flashdata untuk kesalahan input atau untuk pesan error sebelumnya
			$main['message'] = (validation_errors()) ? validation_errors() : $this->ion_auth->errors();

			//buat array untuk membuat field form
			$main['username'] = array('name' => 'username',
				'id' => 'username',
				'type' => 'text',
				'value' => $this->form_validation->set_value('username'),
			);
			$main['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$main['first_name'] = array('name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$main['last_name'] = array('name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$main['company'] = array('name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$main['phone'] = array('name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$main['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$main['password_confirm'] = array('name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			$data['content'] = $this->load->view('register_v', $main, true);
			$this->load->view('template', $data);
		}
	}
	
	function lupa_password()
	{
		$data['title'] = "Halaman Lupa Password";
		
		//set validasi untuk email
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email');
		
		//apabila validasi salah atau form dibuka pertama kali
		if ($this->form_validation->run() == false)
		{
			$main['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text'
			);
			
			//set any errors and display the form
			$main['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$data['content'] = $this->load->view('lupa_password_v', $main, true);
			$this->load->view('template', $data);
		}
		else //apabila validasi benar
		{
			//jalankan fungsi forgotten_password() untuk mengirimkan link reset password melalui email
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			//apabila tidak ada error
			if ($forgotten)
			{
				//set message dari library ke flashdata
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('auth/login', 'refresh');
			}
			else //apabila ada error pada saat menjalankan forgotten_password()
			{
				//set pesan error dari library ke flashdata
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/lupa_password', 'refresh');
			}
		}
	}
	
	function user_page(){
		//apabila user sudah login
		if($this->ion_auth->logged_in())
		{
			$data['title'] = "Halaman User/Member";
			$data['content'] = $this->load->view('user_page_v', null, true);
			$this->load->view('template', $data);
		} 
		else //apabila belum login
		{
			//redirect ke halaman login
			redirect('auth/login');
		}
	}
	
	function admin_page(){
		//apabila user sudah login dan statusnya sebagai administrator
		if($this->ion_auth->is_admin())
		{
			$data['title'] = "Halaman Administrator";
			$data['content'] = $this->load->view('admin_page_v', null, true);
			$this->load->view('template', $data);
		} 
		else //apabila bukan administrator
		{
			//anggap halaman admin tersebut tidak ada
			show_404();
		}
	}
	
	/* BERIKUT FUNGSI-FUNGSI UNTUK MEMPROSES DATA
	 * - function logout() untuk menghapus session user
	 * - function aktivasi() untuk mengaktifkan akun user
	 * - function reset_password() untuk mereset password user
	 * */
	 
	function logout(){
		//log out pengguna
		$this->ion_auth->logout();

		//redirect ke halaman index
		redirect('auth');
	}
	 
	function aktivasi($id, $code=false)
	{
		//apabila $code berisi nilai dari link yang dikirim melalui email
		if ($code !== false)
			//aktifkan akun dengan id $id dengan terlebih dahulu mencocokkan $code -
			//dengan yang sudah terdaftar di dalam database
			$activation = $this->ion_auth->activate($id, $code);

		//apabila aktivasi berhasil
		if ($activation)
		{
			//redirect ke auth/index untuk dipersilakan login
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth/login');
		}
		else //apabila aktivasi gagal
		{
			//redirect ke halaman lupa_password()
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/lupa_password');
		}
	}
	
	public function reset_password($code)
	{
		//mengirimkan kode $code, mencocokkannya dengan database dan mereset password
		$reset = $this->ion_auth->forgotten_password_complete($code);

		//apabila reset password sukses
		if ($reset)
		{
			//redirect ke halaman index
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth/index');
		}
		else //apabila reset password gagal
		{
			//redirect ke halaman lupa_password()
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/lupa_password');
		}
	}
	
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
