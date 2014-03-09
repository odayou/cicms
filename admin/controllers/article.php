<?php
class Article extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("article_model");

	}
	
    //新加
	public function create(){
		$this->load->helper('form');
		$this->load->library("form_validation");

		$data['title'] = "add a new item";
		$this->form_validation->set_rules('title', 'title', 'required');
  		$this->form_validation->set_rules('text', 'text', 'required');

  		if($this->form_validation->run() === false){
  			$this->load->view("templates/header",$data);
  			$this->load->view("admin/article/create");
  			$this->load->view("templates/footer");
  		}else{
  			if($this->article_model->set_article()){
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
					'title' => $_POST['title'],
					'category_id' => $_POST['category_id'],
					'text' => $_POST['text']
				);

				$up = $this->article_model->up_article($_POST['id'],$data);

				if($up){
					$this->load->view('admin/article/update',array('result' => "修改成功"));
					$this->load->view("templates/footer");
					
				}else{
					$data = array(
						'news' => $this->article_model->get_article($_POST['id']),
						'result' => '更新失败或内容未发生变化!'
					);
					$this->load->view('admin/article/update',$data);
					$this->load->view("templates/footer");
				}
			}
		}else{
			
			$id = $this->uri->segment(3);//取得id
			$data['news'] = $this->article_model->get_article($id);
			
			$this->load->view('admin/article/update',$data);
			$this->load->view("templates/footer");
		}

	}
	
	//删除
	public function delete(){
		$id = $this->uri->segment(3);
		if($row = $this->article_model->delete($id)){
			
		}
	
	}
	
	//全部列出
	public function lists(){
        $this->load->model("article_model");
      	$this->load->library('pagination');

      	$config['base_url']=base_url().$this->config->item('index_page')."/article/lists";

		$config['total_rows'] = $this->db->count_all('news');

		$config['pre_page'] = 10;
		
		$config['num_links'] = 3;
		
		$config['full_tag_open'] = "<ul class='pagenav'>";
		
		$config['full_tag_close'] = "</ul>";
		
		$config['num_tag_open'] = "<li>";
		
		$config['num_tag_close'] = "</li>";
		
		$config['cur_tag_open'] = "<li>";
		
		$config['cur_tag_close'] = "</li>";
		
		$config['prev_link'] = "上一页";
		
		$config['prev_tag_open'] = "<li>";
		
		$config['prev_tag_close'] = "</li>";
		
		$config['next_link'] = "下一页";
		
		$config['next_tag_open'] = "<li>";
		
		$config['next_tag_close'] = "</li>";
		
		$config['first_link'] = '首页';
		
		

		$this->pagination->initialize($config);

		$data = array(
             "news" => $this->article_model->articleList($config['pre_page'],$this->uri->segment(3)!==FALSE?$this->uri->segment(3):0),
			 
			 "page" => array(
                'total' => $config['total_rows'],
                'num' => $config['pre_page'],
                'page' => (int) (($config['total_rows'] % $config['pre_page'] === 0) ? ($config['total_rows'] / $config['pre_page']) : ($config['total_rows'] / $config['pre_page'] + 1))
                
			)
        );
		//echo $this->db->last_query();

		$this->load->view("admin/article/lists",$data);
		$this->load->view("templates/footer");
	}



}