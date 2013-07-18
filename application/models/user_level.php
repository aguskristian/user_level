<?php
	class User_level extends CI_Model
	{
	function __construct(){
	
		parent::__construct();
		
			$this->load->database();
	}
	#input data dari form station
	function add_station($data)
		{
			$query =$this->db->insert('var_station',$data);
		}
	#input data dari form unit	
	function add_unit($data)
		{
			$query =$this->db->insert('var_user',$data);
		}
	#input data dari form sub unit	
	function add_sub_unit($data)
		{
			$query =$this->db->insert('var_unit',$data);
		}
	#input data dari form team	
	function add_team($data)
		{
			$query =$this->db->insert('var_team',$data);
		}
	#input data dari form function	
	function add_function($data)
		{
			$query =$this->db->insert('var_function',$data);
		}
	#input data dari form function	
	function add_position($data)
		{
			$query =$this->db->insert('var_position',$data);
		}
	
	}