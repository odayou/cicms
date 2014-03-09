<?php
class Article_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		$this->load->model('category_model');
	}
	
	//获取单条
	public function get_article($slug = FALSE){
	
		if($slug === FALSE){
			$query = $this->db->get("news");
			return $query->result_array();
		}
		$query = $this->db->get_where('news',array('id'=>$slug));
		return $query->row_array();
	}

	//添加
	public function set_article(){
		$this->load->helper("url");
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
  
	  $data = array(
	    'title' => $this->input->post('title'),
	    'slug' => $slug,
	    'text' => $this->input->post('text')
	  );
	  
	  return $this->db->insert('news', $data);
	}
	
	//更新
	public function up_article($id,$data){
		$where = array(
			'id' => $id
		);
		$this->db->update('news',$data,$where);
		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
	
	//删除
	public function delete($id){
		$where = array(
			'id'=>$id
		);
		$this->db->delete('news',$where);
		if($this->db->affected_rows() >= 1){
			return $this->db->affected_rows();
		}else{
			return false;
		}
	}
	
	//列出
	public function articleList($s=0,$l=0){
	
		$this->db->limit($s,$l);
		$this->db->order_by('id','desc');
		$rel = $this->db->get('news');
		
		return $result = $rel->result_array();
	}
	
}