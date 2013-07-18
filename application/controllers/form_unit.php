<?php

	class Form_unit extends CI_Controller 
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
					
						'vu_code'          	=> $this->input->post('vu_code'),
						'vu_name'    		=> $this->input->post('vu_name'),
						'vu_vs_code'        => $this->input->post('vu_vs_code'),
						'vu_level'          => $this->input->post('vu_level')
						);
			$this->user_level->add_unit( $data );
			}
			$this->load->view('form/form_unit');
		}
		
		
		
	}
?>