<?php
/*
*操作动作模块
*动作对应到操作类型
*/

class Action_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}
	
	//添加动作
	public function addAction(){
		$data = array(
			'action_code' => $this->input->post('action_code'),
			'action_info' => $this->input->post('action_info'),
			'parent_id' => $this->input->post('parent_id')
		);
		
		return $this->db->insert('admin_action',$data);
	}
	
	//获取动作信息
	public function getAction($slug = false){
		if($slug === false){
			//get all action
			$query = $this->db->get('admin_action');
			return $query->result_array();
		}
		//get one action
		$id = $slug;
		$where = array(
			'id' => $id
		);
		$query = $this->db->get_where('admin_action',$where);
		return $query->row_array();
		
	}
	
	//更新动作
	public function editAction(){
		$data = array(
			'action_code' => $this->input->post('action_code'),
			'action_info' => $this->input->post('action_info'),
			'parent_id' => $this->input->post('parent_id')
		);
		$where = array(
			"id" => $this->input->post('id')
		);
		$this->db->update('admin_action',$data,$where);
		
		return ($this->db->affected_rows()==1) ? true : false;
	} 
	
	//删除动作
	public function deleteAction(){
	
	}

}