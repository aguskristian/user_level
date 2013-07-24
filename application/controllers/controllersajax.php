<?php

	class Controllersajax extends CI_Controller 
		{
			function __construct()
    			{
					parent::__construct();
					#memanggil helper 'form','array'
					$this->load->helper(array('form', 'url'));
					#memanggil model 'asset_models'
					$this->load->model('user_level');
					#memanggil library 'ag_auth'
					
				}
				
			public function get( $file )
			{
				$this->load->view( str_replace( '-', '/', $file ));					
			}
			
	}
?>