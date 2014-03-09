<?php
class Category extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("category_model");

	}
	
    //新加
	public function create(){
		$this->load->helper('form');
		$this->load->library("form_validation");

		$data['title'] = "add a new item";
		$this->form_validation->set_rules('category_name', 'category_name', 'required');

  		if($this->form_validation->run() === false){
  			$this->load->view("templates/header",$data);
  			$this->load->view("admin/category/create");
  			$this->load->view("templates/footer");
  		}else{
  			if($this->category_model->create()){
				$this->lists();
			}
  		}
		
	}

	//更新
	public function update(){

		$this->load->helper('form','url');
		
		if(isset($_POST['action'])){
			if($_POST['action'] == 'update'){
				$data = array(
					'category_name' => $_POST['category_name'],
					'parent_id' => $_POST['parent_id'],
					'ordernum' => $_POST['ordernum']
				);

				$up = $this->category_model->update($_POST['category_id'],$data);
				if($up){
					$this->load->view('admin/category/update',array('result' => "修改成功"));
					$this->load->view("templates/footer");
					
				}else{
					$data = array(
						'cate' => $this->article_model->getOneCate($_POST['id']),
						'result' => '更新失败或内容未发生变化!'
					);
					$this->load->view('admin/category/update',$data);
					$this->load->view("templates/footer");
				}
			}
		}else{
			
			$id = $this->uri->segment(3);//取得id
			$data['cate'] = $this->category_model->getOneCate($id);
			$this->load->view('admin/category/update',$data);
			$this->load->view("templates/footer");
		}

	}
	
	//删除
	public function delete(){
		$id = $this->uri->segment(3);
		if($row = $this->category_model->delete($id)){
			
		}
	
	}
	
	//全部列出
	public function lists(){
       
		$data = array(
             "cates" => $this->category_model->getAllCategory2()
        );

		$this->load->view("admin/category/lists",$data);
		$this->load->view("templates/footer");
	}



}