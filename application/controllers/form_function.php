<?php

	class Form_function extends CI_Controller 
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
					
						'vf_code'          	=> $this->input->post('vt_code'),
						'vf_name'           => $this->input->post('vf_name'),
						'vf_level'          => $this->input->post('vf_level')
						);
			$this->user_level->add_function( $data );
			}
			$this->load->view('form/form_function');
		}
		
		
		
	}
?>