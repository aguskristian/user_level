<?php

	class Station extends CI_Controller 
	{
		private $data;
			
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
			$this->user_level->add_station( $data );
			}
			#menampilkan form inputan station
			$this->load->view('station/form_station');
		}
		
		function tabel_station(){
		
			$data['records'] = $this->user_level->station_tabel();
					
			#menampilkan tabel station
			$this->load->view('station/tabel_station',$data);	
		
		}
		
	}
?>