<?php

	class Station extends CI_Controller 
	{
			
		function __construct()
    		{
				parent::__construct();
					#memanggil helper 'form','array'
					$this->load->helper(array('form', 'url'));
					#memanggil Models 'user_level'					
					$this->load->model('user_level');
			}
				
		function add_station()
		{
			#input data station
			if ( $this->input->post('submit') ) {
			$data = array(
						#input post data dari form menuju field dalam database level
						'vs_code'          	=> $this->input->post('vs_code'),
						'vs_name'         	=> $this->input->post('vs_name'),
						'vs_level'          => $this->input->post('vs_level')
						);
			#fungsi input data yang ada dalam model user level
			$this->user_level->input_station( $data );
			}
			#menampilkan form inputan station
			$this->load->view('station/form_station');
			#redirect('station/tabel_station');
		}
		
		function tabel_station()
		{
			$data['records'] = $this->user_level->station_tabel();
					
			#menampilkan tabel station
			$this->load->view('station/tabel_station',$data);	
		
		}
		
		function delete($id)
		{
			#delete data station berdasarkan id
			$this->user_level->delete_station($id);
			#load view tabel_station
			redirect('station/tabel_station');
			
		}
		
		function edit($id)
		{
			$query = $this->user_level->edit_station($id);
					 $data['fvs_code']    = $query ['vs_code'];
					 $data['fvs_name']    = $query ['vs_name'];
		 			 $data['fvs_level']   = $query ['vs_level'];
		
			$this->load->view('station/edit_station',$data);
		}
		
		function submit()
    	{
					#menyimpan nilai input di file sementara dan menyimpan ke field database
                    $vs_code               = $this->input->post('vs_code');
					$vs_name               = $this->input->post('vs_name');
					$vs_level              = $this->input->post('vs_level');
					
					$data = array(
					'vs_code'                =>$vs_code,
					'vs_name'                =>$vs_name,
					'vs_level'               =>$vs_level);
					
					$this->db->where('vs_code',$vs_code);
					$this->db->update('var_station',$data);
					
				 	#script mengarahkan ke tabel_asset
					redirect('station/tabel_station');
		}
	}
?>