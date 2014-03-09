<?php

/********************配置各模块中，用户需要验证权限的操作*******************************/

//普通用户的权限验证
$config['acl']['visitor'] = array(
	'' => array('index'),
	'news' => array('index','list','add','edite','delete')//新闻需要验证权限的操作
);

//超级管理的权限验证
$config['acl']['admin'] = array(
	'' => array('index'),
	'news' => array('index','list','add','edite','delete')//新闻需要验证权限的操作	
);

/*******************配置权限验证提示信息**************************/

//验证登陆
$config['acl_info']['onlogin'] = array(
	'info' => '登录以完成操作',
	'back_url' => 'user/login'
);

//操作权限
$config['acl_info']['more_role'] = array(
	'info' => '缺少操作权限',
	'back_url' => 'user/uprole'
);

//权限控制
class Acl{
	private $url_model;//所访问的模块，如：music
    private $url_method;//所访问的方法，如：create
    private $url_param;//url所带参数 可能是 1 也可能是 id=1&name=test
    private $CI;
    
    function Acl()
    {
        $this->CI = & get_instance();
        $this->CI->load->library('session');
 
        $url = $_SERVER['PHP_SELF'];
        $arr = explode('/', $url);
        $arr = array_slice($arr, array_search('index.php', $arr) + 1, count($arr));
        $this->url_model = isset($arr[0]) ? $arr[0] : '';
        $this->url_method = isset($arr[1]) ? $arr[1] : 'index';
        $this->url_param = isset($arr[2]) ? $arr[2] : '';
    }
 
    function filter()
    {
        $user = $this->CI->session->userdata('user');
        if (empty($user)) {//游客visitor
            $role_name = 'visitor';
        } else {
            $role_name = $user->role;
        }
 
        $this->CI->load->config('acl');
        $acl = $this->CI->config->item('acl');
        $role = $acl[$role_name];
        $acl_info = $this->CI->config->item('acl_info');
 
        if (array_key_exists($this->url_model, $role) && in_array($this->url_method, $role[$this->url_model])) {
            ;
        } else {//无权限，给出提示，跳转url
            $this->CI->session->set_flashdata('info', $acl_info[$role_name]['info']);
            redirect($acl_info[$role_name]['return_url']);
        }
    }
    
}