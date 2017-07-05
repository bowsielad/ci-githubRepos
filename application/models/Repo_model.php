<?php

class Repo_model extends CI_Model{
	
	public function __construct(){
		
		$this->load->database();
		
	}
	
	public function get_repo($slug = FALSE){
		
		
		if($slug === FALSE){
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('repos_Data');
			return $query->result_array();
			
			}
			
			$query = $this->db->get_where('repos_Data', array('slug' => $slug));
			return $query->row_array();
		
		}
		
	public function get_links(){
		
		$query = $this->db->get('repos_Data');
        return $query->result_array();
		}
		
	public function create_repo(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body')
				
			);

			return $this->db->insert('repos_Data', $data);
		}
		
		
	public function delete_repo($id){
			
			$this->db->where('id', $id);
			$this->db->delete('repos_Data');
			return true;
		}
		
	public function update_repo(){
		
		$slug = url_title($this->input->post('title'));
		
		$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body')
				
			);
			
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('repos_Data', $data);
	}

}



