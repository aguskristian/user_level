<?php

	class Team extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url','form' ));	
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
			if ( $this->input->post( 'search' ) ) $data['records'] = $this->user_level->search_team( $this->input->post( 'search' ));		
			#menampilkan tabel team
			$this->load->view('team/tabel_team',$data);	
		
		}
		
		function edit($id)
		{
			$query = $this->user_level->edit_team($id);
					 $data['fvt_code']    	= $query ['vt_code'];
					 $data['fvt_name']    	= $query ['vt_name'];
					 $data['fvt_vsu_code'] 	= $query ['vt_vsu_code'];
					 $data['fvt_level']   	= $query ['vt_level'];
		
			$this->load->view('team/edit_team',$data);
		}
		
		
		function delete($id)
		{
			#delete data team berdasarkan id
			$this->user_level->delete_team($id);
			#load view tabel_team
			redirect('team/tabel_team');
		}
		
		function submit()
    	{
					#menyimpan nilai input di file sementara dan menyimpan ke field database
                    $vt_code               = $this->input->post('vt_code');
					$vt_name               = $this->input->post('vt_name');
					$vt_vsu_code		   = $this->input->post('vt_vsu_code');
					$vt_level              = $this->input->post('vt_level');
					
					$data = array(
					'vt_code'                =>$vt_code,
					'vt_name'                =>$vt_name,
					'vt_vsu_code'			 =>$vt_vsu_code,
					'vt_level'               =>$vt_level);
					
					$this->db->where('vt_code',$vt_code);
					$this->db->update('var_team',$data);
					
				 	#script mengarahkan ke tabel_asset
					redirect('team/tabel_team');
		}
		
		
		
	}
?>