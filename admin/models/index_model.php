<?php
/*
 * filename:index_model.pgp
 * class: Index_Model
 * for:后台主入口文件负责总资源调用以及后台的验证等操作
 * */
class Index_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
}