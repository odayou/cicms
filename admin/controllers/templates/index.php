<?php
//

class Index extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('templates_model');
		
		//全局权限验证
		/*权限验证部分*/
	}
	
	 function top(){
			$this->load->view("templates/top");
	}

}

?>