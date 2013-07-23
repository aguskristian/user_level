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
					'vu_vs_code'			 =>$vu_vs_level,
					'vu_level'               =>$vu_station);
					
					$this->db->where('vu_code',$vu_code);
					$this->db->update('var_unit',$data);
					
				 	#script mengarahkan ke tabel_asset
					redirect('unit/tabel_unit');
		}
		
		
		
	}
?>