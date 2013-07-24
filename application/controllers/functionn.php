<?php

	class Functionn extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url','form' ));	
				$this->load->model('user_level');
			}
				
		function add_function()
		{
		
			if ( $this->input->post('submit') ) {
			$data = array(
					
						'vf_code'          	=> $this->input->post('vf_code'),
						'vf_name'           => $this->input->post('vf_name'),
						'vf_level'          => $this->input->post('vf_level')
						);
			$this->user_level->add_function( $data );
			}
			$this->load->view('functionn/form_function');
		}
		
		function tabel_function(){
		
			$data['records'] = $this->user_level->function_tabel();
			if ( $this->input->post( 'search' ) ) $data['records'] = $this->user_level->search_function( $this->input->post( 'search' ));		
			#menampilkan tabel station
			$this->load->view('functionn/tabel_function',$data);	
		
		}
		function delete($id)
		{
			#delete data function berdasarkan id
			$this->user_level->delete_function($id);
			#load view tabel_station
			redirect('functionn/tabel_function');
		}
		
		function edit($id)
		{
			#edit data function  
			$query = $this->user_level->edit_function($id);
					 $data['fvf_code']    = $query ['vf_code'];
					 $data['fvf_name']    = $query ['vf_name'];
					 $data['fvf_level']   = $query ['vf_level'];
		
			$this->load->view('functionn/edit_function',$data);
		}
		
		function submit()
    	{
					#menyimpan nilai input di file sementara dan menyimpan ke field database
                    $vf_code               = $this->input->post('vf_code');
					$vf_name               = $this->input->post('vf_name');
					$vf_level              = $this->input->post('vf_level');
					
					$data = array(
					'vf_code'                =>$vf_code,
					'vf_name'                =>$vf_name,
					'vf_level'               =>$vf_level);
					
					$this->db->where('vf_code',$vf_code);
					$this->db->update('var_function',$data);
					
				 	#script mengarahkan ke tabel_asset
					redirect('functionn/tabel_function');
		}
		
		
		
	}
?>