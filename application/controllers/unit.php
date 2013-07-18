<?php

	class Unit extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url' ));	
				$this->load->model('user_level');
			}
				
		function add_unit()
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
			$this->load->view('unit/form_unit');
		}
		
		function tabel_unit(){
		
			$data['records'] = $this->user_level->unit_tabel();
					
			#menampilkan tabel station
			$this->load->view('unit/tabel_unit',$data);	
		
		}
		
		
		
	}
?>