<?php

/**
 *filename:index.php
 *for:后台主调度
**/

class Index extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("index_model");

		//全局权限验证
		/*权限验证部分
		 * some code...
		 */
	}


	/*
	 * 框架加载
	 */

	 //后台主页
	function index(){
		$this->load->view("admin/main");
	}

	
	//后台主面板
	function body(){
		$data = array(
			'verson' => "2003V1.0开发版"
		);
		$this->load->view("admin/body.php",$data);
	}

	//后台页脚
	function footer(){
		$this->load->view("admin/footer");
	}

	//后台右侧模板
	function left(){
		$data = array(
			"leftmenu" =>array(
			
				"内容管理" => array(
					"分类列表" => array(
						"url" => "../category/lists"
					),
					"文章列表" => array(
						"url" => "../article/lists"
					)
					
				),
				
				
				"用户" => array(
					"角色设置" => array(
						"url" => "../roles/"
					),
					"用户管理" => array(
						"url" => "../user/lists"
					),
					"权限管理" => array(
						"url" => "../action/lists"
					),
					"其他业务" => array(
						"url" => "#"
					)
				),
					
				"part3" => array(
					"3.1" => array(
						"url" => "#"
					),
					"3.2" => array(
						"url" => "#"
					),
					"3.3" => array(
						"url" => "#"
					)
					
				),
				
				"part4" => array(
					"4.1" => array(
						"url" => "#"
					),
					"4.2" => array(
						"url" => "#"
					),
					"4.3" => array(
						"url" => "#"
					),
					"4.4" => array(
						"url" => "#"
					)
					
				)
			)
		);
		
		$this->load->view("admin/left",$data);
	}
	

}