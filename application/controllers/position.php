<?php

	class Position extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url','form' ));	
				$this->load->model('user_level');
			}
				
		function add_position()
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
			$this->load->view('position/form_position');
			#redirect('position/tabel_position');
		}
		
		function tabel_position()
		{
		
			$data['records'] = $this->user_level->position_tabel();
			if ( $this->input->post( 'search' ) ) $data['records'] = $this->user_level->search_position( $this->input->post( 'search' ));		
			#menampilkan tabel station
			$this->load->view('position/tabel_position',$data);	
			
		}
		
		function delete($id)
		{
			#delete data position berdasarkan id
			$this->user_level->delete_position($id);
			#load view tabel_position
			redirect('position/tabel_position');
		}
		
		function edit($id)
		{
			$query = $this->user_level->edit_position($id);
					 $data['fvp_code']    = $query ['vp_code'];
					 $data['fvp_name']    = $query ['vp_name'];
					 $data['fvp_vt_code'] = $query ['vp_vt_code'];
					 $data['fvp_vf_code'] = $query ['vp_vf_code'];
					 $data['fvp_level']   = $query ['vp_level'];
		
			$this->load->view('position/edit_position',$data);
		}
		
		function submit()
    	{
					#menyimpan nilai input di file sementara dan menyimpan ke field database
                    $vp_code               = $this->input->post('vp_code');
					$vp_name               = $this->input->post('vp_name');
					$vp_vt_code            = $this->input->post('vp_vt_code');
					$vp_vf_code            = $this->input->post('vp_vf_code');
					$vp_level              = $this->input->post('vp_level');
					
					$data = array(
					'vp_code'                =>$vp_code,
					'vp_name'                =>$vp_name,
					'vp_vt_code'             =>$vp_vt_code,
					'vp_vf_code'             =>$vp_vf_code,
					'vp_level'               =>$vp_level);
					
					$this->db->where('vp_code',$vp_code);
					$this->db->update('var_position',$data);
					
				 	#script mengarahkan ke tabel_asset
					redirect('position/tabel_position');
		}
		
		
		
	}
?>