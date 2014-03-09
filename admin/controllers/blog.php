<?php
class Blog extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		echo "hello blog!";
	}
	
	public function other(){
		echo "hi, other!";
	}
}