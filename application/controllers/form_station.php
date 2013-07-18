<?php

	class Form_station extends CI_Controller 
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
					
						'vs_code'          	=> $this->input->post('vs_code'),
						'vs_name'         	=> $this->input->post('vs_name'),
						'vs_level'          => $this->input->post('vs_level')
						);
			$this->user_level->add_station( $data );
			}
			$this->load->view('form/form_station');
		}
		
		
		
	}
?>