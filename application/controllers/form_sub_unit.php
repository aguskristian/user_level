<?php

	class Form_sub_unit extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url' ));	
				$this->load->model('user_level');
			}
				
		function index()
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
			$this->load->view('form/form_sub_unit');
		}
		
		
		
	}
?>