<?php

	class tabel_station extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url' ));	
				$this->load->model('user_level');
			}
				
		function tb_station()
		{
				
			$this->load->view('tabel_station');
		}
		
		
		
	}
?>