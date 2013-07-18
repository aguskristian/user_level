<?php

	class homepage extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url' ));
					
				$this->data['current_page'] = 'home';
			}
				
		function index()
		{
			$this->load->view('index/index', $this->data);
		}
		
	}
?>