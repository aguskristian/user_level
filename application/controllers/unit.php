<?php

	class Unit extends CI_Controller 
	{
		private $data;
			
		function __construct()
    		{
				parent::__construct();
				$this->load->helper( array( 'url','form' ));	
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
			if ( $this->input->post( 'search' ) ) $data['records'] = $this->user_level->search_unit( $this->input->post( 'search' ));		
			#menampilkan tabel station
			$this->load->view('unit/tabel_unit',$data);	
		
		}
		
		
		function delete($id)
		{
			#delete data station berdasarkan id
			$this->user_level->delete_unit($id);
			#load view tabel_station
			redirect('unit/tabel_unit');
		}
		
		function edit($id)
		{
			$query = $this->user_level->edit_unit($id);
					 $data['fvu_code']    = $query ['vu_code'];
					 $data['fvu_name']    = $query ['vu_name'];
					 $data['fvu_vs_code'] = $query ['vu_vs_code'];
					 $data['fvu_level']   = $query ['vu_level'];
		
			$this->load->view('unit/edit_unit',$data);
		}
		
		function submit()
    	{
					#menyimpan nilai input di file sementara dan menyimpan ke field database
                    $vu_code               = $this->input->post('vu_code');
					$vu_name               = $this->input->post('vu_name');
					$vu_vs_code			   = $this->input->post('vu_vs_code');
					$vu_level              = $this->input->post('vu_level');
					
					$data = array(
					'vu_code'                =>$vu_code,
					'vu_name'                =>$vu_name,
					'vu_vs_code'			 =>$vu_vs_code,
					'vu_level'               =>$vu_level);
					
					$this->db->where('vu_code',$vu_code);
					$this->db->update('var_unit',$data);
					
				 	#script mengarahkan ke tabel unit
					redirect('unit/tabel_unit');
		}
		
	}
?>