<?php

	class Functionn extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url' ));	
				$this->load->model('user_level');
			}
				
		function add_function()
		{
		
			if ( $this->input->post('submit') ) {
			$data = array(
					
						'vf_code'          	=> $this->input->post('vt_code'),
						'vf_name'           => $this->input->post('vf_name'),
						'vf_level'          => $this->input->post('vf_level')
						);
			$this->user_level->add_function( $data );
			}
			$this->load->view('functionn/form_function');
		}
		
		function tabel_function(){
		
			$data['records'] = $this->user_level->function_tabel();
					
			#menampilkan tabel station
			$this->load->view('function/tabel_function',$data);	
		
		}
		
		
		
	}
?>