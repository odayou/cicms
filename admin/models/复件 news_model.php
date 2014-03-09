<?php
class News_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function get_news($slug = FALSE){
	
		if($slug === FALSE){
			$query = $this->db->get("news");
			return $query->result_array();
		}
		$query = $this->db->get_where('news',array('id'=>$slug));
		return $query->row_array();
	}

	
	public function set_news(){
		$this->load->helper("url");
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
  
	  $data = array(
	    'title' => $this->input->post('title'),
	    'slug' => $slug,
	    'text' => $this->input->post('text')
	  );
	  
	  return $this->db->insert('news', $data);
	}
	
	public function up_news($id,$data){
		$this->db->where('id',$id);
		$this->db->update('news',$data);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete($id){
		$this->db->delete('news',array('id'=>$id));
		
		if($this->db->affected_rows() >= 1){
			return $this->db->affected_rows();
		}else{
			return false;
		}
	}
	
	public function newsList($s=0,$l=0){
	
		$this->db->limit($s,$l);
		$this->db->order_by('id','desc');
		$rel = $this->db->get('news');
		
		return $result = $rel->result_array();
	}
	
}