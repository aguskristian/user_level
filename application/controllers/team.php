<?php

	class Team extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url' ));	
				$this->load->model('user_level');
			}
				
		function add_team()
		{
		
			if ( $this->input->post('submit') ) {
			$data = array(
					
						'vt_code'          			=> $this->input->post('vt_code'),
						'vt_name'         			=> $this->input->post('vt_name'),
						'vt_vsu_code'          		=> $this->input->post('vt_vsu_code'),
						'vt_level'              	=> $this->input->post('vt_level')
						);
			$this->user_level->add_team( $data );
			}
			$this->load->view('team/form_team');
		}
		
		function tabel_team(){
		
			$data['records'] = $this->user_level->team_tabel();
					
			#menampilkan tabel station
			$this->load->view('team/tabel_team',$data);	
		
		}
		
		
		
	}
?>