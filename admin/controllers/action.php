<?
/*
*后台动作模块控制器
*/
class Action extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('action_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function index(){
		$this->lists();
	}
	public function lists(){
	
		$data = array(
			'actions' => $this->action_model->getAction()
		);
		
		$this->load->view('templates/header');
		$this->load->view('admin/action/list',$data);
		$this->load->view('templates/footer');
	}
	
	public function add(){
		
		
		$this->form_validation->set_rules('action_code','action_code','required');
		$this->form_validation->set_rules('action_info','action_info','required');
		
		if($this->form_validation->run() === false){
			$data = array(
				'actions' => $this->action_model->getAction()
			);
			$this->load->view('templates/header');
			$this->load->view('admin/action/list',$data);
			$this->load->view('templates/footer');
				
		}else{
	
			if($this->action_model->addAction()){
				$this->lists();
			}
		}
		
		
	}
}