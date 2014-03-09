<?php
/*
*分类模块
*/
class Category_model extends CI_Model{
	private $level =1;//层级数
	public function __construct(){
		$this->load->database();
	}
	
	
	/*
	*	创建分类
	*/
	public function create(){
	
		if($this->db->insert('category', $this->input->post())) {
			return true;
		}else{
			return false;
		}
			
	}
	
	/*
	*	修改目录
	*/
	public function update($category_id,$date){
		
		$this->db->where('category_id',$category_id);
		
		if($this->db->update('category',$date)) {
			return true;
		}else{
			return false;
		}
	
	}
	
	/*
	*删除目录
	*参数:
	*	$dir_id:目录id
	*/
	public function deleteDir($dir_id){
	
		$sql="delete dir where dir_id = $dir_id";
		
		$this->db->where('category_id',$this->input->post('category_id'));
		
		if($this->db->delete('category')){
			return true;
		}else{
			return false;
		}
		/*
		* 其他操作,如当前目录下文档自动向其他类别归类，
		*/
	
	}
	
	/*
	*查询单个目录信息
	*/
	public function getOneCate($category_id){
		$this->db->where('category_id',$category_id);
		$cate = $this->db->get('category');
		if($cate){
			return $cate->row_array();
		}
	}
	

	
	public function getFather($dir_id){
		$sql="select * from dir where dir_id=$dir_id";
		if($dir = $this->db->query($sql)){
		
		}
	}
	
		
	
	/*
	*判断是否有子节点
	*
	*/
	public function isFatherDir($parent_id){
		$this->db->where('parent_id',$parent_id);
		if($cates = $this->db->get('category') ){
			if(count($cates->result_array()) > 0){
				return true;	
			}else{
				return false;
			}
			
		}
	}
	
	/*
	*查询目录下的子目录
	*/
	public function getChildDir($parent_id){
	
		$result =array();
		global $i;
		$this->db->where('parent_id',$parent_id);
		if($r = $this->db->get('category')){
			foreach($r->result_array() as $dir){//遍历分类下所有子分类
				$i++;
				$result[$dir['category_id']] = $dir;
				if($this->isFatherDir($dir['category_id'])){
					$result[$dir['category_id']]['child']= $this->getChildDir($dir['category_id']);
				}
				
			}
			
			return $result;
		}
			
	}

	
	/*
	*获取所有节点
	*public $db;
	global $dirf= array['fDir'];//存放父节点
	global $dirc= array['cDir'];//存放子节点
	global $numf;//父节点 下标标记
	global $numc;//子节点 下标标记
	*/
	public function getAllCategory(){
		global $dirf;//存放父节点
		global $numf;//父节点 下标标记
		
		$this->db->where('parent_id',0);
		$this->db->order_by('ordernum','asc');
		if($dir = $this->db->get('category')){
			foreach($dir->result_array() as $dirx){//当前分类的信息
				$numf++;
				$dirf[$numf] = $dirx;//存放当前分类
				if($this->isFatherDir($dirx['category_id'])){
					$dirf[$numf]['child'] = $this->getChildDir($dirx['category_id']);//获取当前分类所有子分类
				}
				
				
			}
			echo "<pre/>";
			print_r($dirf);
			return $dirf;
			
		}
		
	}
	
	public function getAllCategory2(){
		$cates = array();
		$this->db->order_by('ordernum','desc');
		if($dir = $this->db->get('category')){
			foreach($dir->result_array() as $cate){
				$cates[$cate['category_id']] = $cate;
			}
			
			$temp = array();
			foreach($cates as $category_id => $cate){
				if($cate['parent_id'] >0){
					$cates[$cate['parent_id']]['child'][$cate['category_id']] = &$cates[$cate['category_id']];
					$temp[] = $category_id;
				
				}
			}
			
			foreach($temp as $t){
				unset($cates[$t]);
			}
		}
		// echo "<pre/>";
		// print_r($cates);
		return $cates;
	}
	
	//获取全部分类，仅用于分类列表
	public function getTree($cates){
		global $w;
		$w += 15;

		 foreach($cates as $cate){

           ?>
             <tr class="list-article">
				<td><input type="checkbox" name="checkbox2" value="<?=$cate['category_id']?>" /></td>
				<td><?=$cate['category_id']?></td>
				<td class="tree-item-name"><span style='display:inline-block;width:<?=$w?>px;'>&nbsp;&nbsp;</span><?="|--".$cate['category_name']?></td>
				<td><?=$cate['ordernum']?></td>
				<td>
					<span class="btn_edit"><a href="update/<?=$cate['category_id']?>">编辑</a></span>
					<span class="btn_delete"><a href='delete/<?=$cate['category_id']?>'>删除</a></span>
				</td>
			</tr>
				
           <?php
				if(isset($cate['child'])){
					$this->getTree($cate['child']);
				}
			
         }
		 $w = '';
			
	}

	
	/*获取全部分类，用以创建 或者 编辑分类等
	* 参数:
	* $category_id:当前分类的id，用于编辑分类,可以为数值或数组
	* $parent_id:当前分类的父级分类id，用于编辑分类
	* $cates:全部分类
	*/
	public function getTree2($category_id =0,$parent_id=0,$cates){
		global $h;
		$h .="&nbsp;&nbsp;&nbsp;&nbsp;";
		
		$category_id_arr =array();
		
		//文章所属分类
		if(is_array($category_id)){
			$category_id_arr = $category_id;
		}else{
		//分类的父分类
			array_push($category_id_arr,$parent_id);
		}
		
		foreach($cates as $cate){
			
			if(in_array($cate['category_id'],$category_id_arr)){
			
				if($cate['parent_id'] == 0){
					echo "<option value='".$cate['category_id']."' selected='selected'>顶级分类";
				}else{
					echo "<option value='".$cate['category_id']."' selected='selected'>";
				}
				
			}else{
				echo "<option value='".$cate['category_id']."'>";
			}


			echo $h."|--".$cate['category_name'];
			echo "</option>";
			if(isset($cate['child'])){
				$this->getTree2($category_id,$parent_id,$cate['child']);
			}
			
		}
		$h="";
	}	
	
			
}