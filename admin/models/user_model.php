<?php
/*
*用户模块
*/
class User_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
//////////////单个用户////////////////////	

	//检测超管
	public function is_admin(){
	
	}
	
	//用户信息 , 角色信息 及其他
	public function getOneUser(){
	
	}
	
	//检测用户登录
	public function is_login(){
	
	}
	
	
	//登录
	public function login(){
	
	} 
	
	//登出
	public function logout(){
	
	}

//////////////////////用户读写操作

	//列出所用用户
	public function getAllUser(){
	
	}
	
	//添加用户
	public function addUser(){
	
	}
	
	//编辑用户
	public function editUser(){
	
	}
	
	//删除用户
	public function deleteUser(){
	
	}
	
}