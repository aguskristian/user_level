<?php

	class Sub_unit extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url' ));	
				$this->load->model('user_level');
			}
				
		function add_sub_unit()
		{
		
			if ( $this->input->post('submit') ) {
			$data = array(
					
						'vsu_code'          	=> $this->input->post('vsu_code'),
						'vsu_name'        	 	=> $this->input->post('vsu_name'),
						'vsu_vu_code'          	=> $this->input->post('vsu_vu_code'),
						'vsu_level'              => $this->input->post('vsu_level')
						);
			$this->user_level->add_sub_unit( $data );
			}
			$this->load->view('sub_unit/form_sub_unit');
		}
		function tabel_sub_unit(){
		
			$data['records'] = $this->user_level->sub_unit_tabel();
					
			#menampilkan tabel station
			$this->load->view('subunit/tabel_sub_unit',$data);	
		
		}
		
		
	}
?>