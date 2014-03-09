<?php
class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');		
	}
	
	function index(){
		//$this->output->cache(5);//相应view缓存5分钟
		$this->load->view('admin/login');
	}
}