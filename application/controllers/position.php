<?php

	class Form_position extends CI_Controller 
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
					
						'vp_code'          	=> $this->input->post('vp_code'),
						'vp_name'    		=> $this->input->post('vp_name'),
						'vp_vt_code'        => $this->input->post('vp_vt_code'),
						'vp_vf_code'        => $this->input->post('vp_vf_code'),
						'vp_level'          => $this->input->post('vp_level')
						);
			$this->user_level->add_position( $data );
			}
			$this->load->view('form/form_position');
		}
		
		
		
	}
?>