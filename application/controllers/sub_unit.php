<?php

	class Sub_unit extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url','form' ));	
				$this->load->model('user_level');
			}
				
		function add_sub_unit()
		{
		
			if ( $this->input->post('submit') ) {
			$data = array(
					
						'vsu_code'          	=> $this->input->post('vsu_code'),
						'vsu_name'        	 	=> $this->input->post('vsu_name'),
						'vsu_vu_code'          	=> $this->input->post('vsu_vu_code'),
						'vsu_level'              => $this->input->post('vsu_level')
						);
			$this->user_level->add_sub_unit( $data );
			}
			$this->load->view('sub_unit/form_sub_unit');
		}
		function tabel_sub_unit(){
		
			$data['records'] = $this->user_level->sub_unit_tabel();
			
			if ( $this->input->post( 'search' ) ) $data['records'] = $this->user_level->search_sub_unit( $this->input->post( 'search' ));		
					
			#menampilkan tabel station
			$this->load->view('sub_unit/tabel_sub_unit',$data);	
		
		}
		
		
		function delete($id)
		{
			#delete data sub_unit berdasarkan id
			$this->user_level->delete_sub_unit($id);
			#load view tabel_sub_unit
			redirect('sub_unit/tabel_sub_unit');
		}
		
		function edit($id)
		{
			$query = $this->user_level->edit_sub_unit($id);
					 $data['fvsu_code']    = $query ['vsu_code'];
					 $data['fvsu_name']    = $query ['vsu_name'];
		 			 $data['fvsu_vu_code']    = $query ['vsu_vu_code'];
					 $data['fvsu_level']   = $query ['vsu_level'];
		
			$this->load->view('sub_unit/edit_sub_unit',$data);
		}
		
		function submit()
    	{
					#menyimpan nilai input di file sementara dan menyimpan ke field database
                    $vsu_code               = $this->input->post('vsu_code');
					$vsu_name               = $this->input->post('vsu_name');
					$vsu_vu_code			= $this->input->post('vsu_vu_code');
					$vsu_level              = $this->input->post('vsu_level');
					
					$data = array(
					'vsu_code'                =>$vsu_code,
					'vsu_name'                =>$vsu_name,
					'vsu_vu_code'			  =>$vsu_vu_code,
					'vsu_level'               =>$vsu_level);
					
					$this->db->where('vsu_code',$vsu_code);
					$this->db->update('var_sub_unit',$data);
					
				 	#script mengarahkan ke tabel_asset
					redirect('sub_unit/tabel_sub_unit');
		}
		
		
	}
?>