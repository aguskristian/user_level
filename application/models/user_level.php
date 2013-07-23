<?php
	class User_level extends CI_Model
	{
	function __construct(){
	
		parent::__construct();
		
			$this->load->database();
	}
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
		
		
	#input data dari form unit	
	function add_unit($data)
		{
			$query =$this->db->insert('var_unit',$data);
		}
		
	function unit_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
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
			
	#input data dari form sub unit	
	function add_sub_unit($data)
		{
			$query =$this->db->insert('var_sub_unit',$data);
		}
		
	function sub_unit_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
       			$query = $this->db->get('var_sub_unit');
				return $query->result();
			}
				
	function delete_sub_unit($id)
			{
        		#menghapus nilai berdasarkan id
				$this->db->delete('var_sub_unit', array('vs_code'=>$id));
    		}
		
	function edit_sub_unit($id)
			{
				$query = $this->db->get_where('var_sub_unit',array('vsu_code'=>$id));
				return $query->row_array();
			}
		
	#input data dari form team	
	function add_team($data)
		{
			$query =$this->db->insert('var_team',$data);
		}
		
	function team_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
       			$query = $this->db->get('var_team');
				return $query->result();
			}	
	#input data dari form function	
	function add_function($data)
		{
			$query =$this->db->insert('var_function',$data);
		}
		
	function function_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
       			$query = $this->db->get('var_function');
				return $query->result();
			}	
	#input data dari form function	
	function add_position($data)
		{
			$query =$this->db->insert('var_position',$data);
		}
	function position_tabel()
    		{
				#memanggil nilai dari tabel 'var_station'
       			$query = $this->db->get('var_position');
				return $query->result();
			}	
	
	}