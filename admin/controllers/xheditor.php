<?php
class Xheditor extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}
	public function display(){
		$this->load->view('plugin/xheditor/xheditor');
	} 
	

}