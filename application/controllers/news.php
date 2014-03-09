<?php
class News extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("news_model");

	}

	public function index(){

		$this->load->helper('url');
		$data['title'] = '新闻列表';
		$data['news'] = $this->news_model->get_news();

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug=FALSE){

		if($slug == FALSE){
			$data['news_item'] = $this->news_model->get_news();

		}else{
			$data['news_item'] = $this->news_model->get_news($slug);
			$data['title'] = $data['news_item']['title'];
		}
		if(empty($data['news_item'])){
			show_404();
		}

		if($slug == FALSE){


			$this->load->view('templates/header', $data);
			$this->load->view('news/view', $data);
			$this->load->view('templates/footer');

		}else{


			$this->load->view('templates/header', $data);
			$this->load->view('news/one', $data);
			$this->load->view('templates/footer');
		}

		/*echo "<pre>";
		print_r($data);
		exit;*/



	}

	public function create(){
		$this->load->helper('form');
		$this->load->library("form_validation");

		$data['title'] = "add a new item";
		$this->form_validation->set_rules('title', 'Title', 'required');
  		$this->form_validation->set_rules('text', 'text', 'required');

  		if($this->form_validation->run() === false){
  			$this->load->view("templates/header",$data);
  			$this->load->view("news/create");
  			$this->load->view("templates/footer");
  		}else{
  			$this->news_model->set_news();
  			$this->load->view("news/success");

  		}


	}


	//public function {}
}