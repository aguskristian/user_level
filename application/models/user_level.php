<?php
	class User_level extends CI_Model
	{
	function __construct(){
	
		parent::__construct();
		
			$this->load->database();
	}
	#---------------------------------------------------------
	#							STATION					     -
	#---------------------------------------------------------
	#input data dari form station
	function input_station($data)
		{
			$query =$this->db->insert('var_station',$data);
		}
	
	function station_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
       			$query = $this->db->get('var_station');
				return $query->result();
			}
			
	function delete_station($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_station', array('vs_code'=>$id));
    		}
		
	function edit_station($id)
			{
				$query = $this->db->get_where('var_station',array('vs_code'=>$id));
				return $query->row_array();
			}
		
	#---------------------------------------------------------
	#						 UNIT						     -
	#---------------------------------------------------------
	#input data dari form unit	
	function add_unit($data)
		{
			$query =$this->db->insert('var_unit',$data);
		}
		
	function unit_tabel()
    		{
				#memanggil nilai dari tabel 'var_unit'
       			$query = $this->db->get('var_unit');
				return $query->result();
			}	
	
	function delete_unit($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_unit', array('vu_code'=>$id));
    		}
		
	function edit_unit($id)
			{
				$query = $this->db->get_where('var_unit',array('vu_code'=>$id));
				return $query->row_array();
			}
			
	#---------------------------------------------------------
	#							SUB UNIT				     -
	#---------------------------------------------------------
	#input data dari form sub unit	
	function add_sub_unit($data)
		{
			$query =$this->db->insert('var_sub_unit',$data);
		}
		
	function sub_unit_tabel()
    		{
				#memanggil nilai dari tabel 'var_unit'
       			$query = $this->db->get('var_sub_unit');
				return $query->result();
			}
				
	function delete_sub_unit($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_sub_unit', array('vsu_code'=>$id));
    		}
		
	function edit_sub_unit($id)
			{
				$query = $this->db->get_where('var_sub_unit',array('vsu_code'=>$id));
				return $query->row_array();
			}
			
	#---------------------------------------------------------
	#							TEAM					     -
	#---------------------------------------------------------	
	#input data dari form team	
	function add_team($data)
		{
			$query =$this->db->insert('var_team',$data);
		}
		
	function team_tabel()
    		{
				#memanggil nilai dari tabel 'var_team'
       			$query = $this->db->get('var_team');
				return $query->result();
			}	
			
	function delete_team($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_team', array('vt_code'=>$id));
    		}
		
	function edit_team($id)
			{
				$query = $this->db->get_where('var_team',array('vt_code'=>$id));
				return $query->row_array();
			}
			
	#---------------------------------------------------------
	#							FUNCTION				     -
	#---------------------------------------------------------
	#input data dari form function	
	function add_function($data)
		{
			$query =$this->db->insert('var_function',$data);
		}
		
	function function_tabel()
    		{
				#memanggil nilai dari tabel 'var_function'
       			$query = $this->db->get('var_function');
				return $query->result();
			}	
			
	function delete_function($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_function', array('vf_code'=>$id));
    		}
		
	function edit_function($id)
			{
				$query = $this->db->get_where('var_function',array('vf_code'=>$id));
				return $query->row_array();
			}
			
	#---------------------------------------------------------
	#							POSITION				     -
	#---------------------------------------------------------		
	#input data dari form function	
	function add_position($data)
		{
			$query =$this->db->insert('var_position',$data);
		}
	function position_tabel()
    		{
				#memanggil nilai dari tabel 'var_position'
       			$query = $this->db->get('var_position');
				return $query->result();
			}

	function delete_position($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_position', array('vp_code'=>$id));
    		}
		
	function edit_position($id)
			{
				$query = $this->db->get_where('var_position',array('vp_code'=>$id));
				return $query->row_array();
			}
	
	}