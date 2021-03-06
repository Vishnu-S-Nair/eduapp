<?php 
class Mlesson extends CI_Model
	{
	   function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			$this->load->database();
		}
		
		function getAlllesson()
		{
			$query = $this->db->query("SELECT * FROM ad_lessons ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		function insert_lesson($insert_data)
		{
			$this->db->insert('ad_lessons',$insert_data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function update_lesson($id,$up_data)
		{
			$this->db->where('id', $id); 
			$this->db->update('ad_lessons',$up_data); 
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		function delete_lesson($data)
		{
			$this->db->delete('ad_lessons',$data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}
		
		
		function getlessonforcourse($courseid,$language)
		{
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE course_id = '".$courseid."' AND language = '".$language."' ORDER BY lesson_order ASC");	
			return $query->result_array();
		}
		
		function getslideforlesson($lessonid)
		{
			$query = $this->db->query("SELECT * FROM ad_slides WHERE lesson_id = '".$lessonid."' ORDER BY slide_order ASC");	
			return $query->result_array();
		}
		
		function getquizforlesson($lessonid)
		{
			$query = $this->db->query("SELECT * FROM ad_quiz WHERE lessonid = '".$lessonid."' ORDER BY created_on DESC");	
			return $query->result_array();
		}
		
		
		
		function getlessonid($data)
		{
			$query = $this->db->query("SELECT * FROM ad_lessons WHERE id = '".$data."'");	
			return $query->result_array();
		}
		
		function getslidebyid($slideid)
		{
			$query = $this->db->query("SELECT a.*,b.name FROM ad_slides a, ad_staff b WHERE a.created_by = b.id AND a.id = '".$slideid."' ORDER BY a.slide_order ASC");	
			return $query->result_array();
		}
		
		
		
	}