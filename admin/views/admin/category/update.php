<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS——Codeigniter demo</title>
</head>
<body>
<?
	if(!empty($result)){
		echo "<p>".$result."</p>";
	}


	if(!empty($cate)){
		echo form_open("category/update");
		echo form_hidden('action','update');
		echo form_hidden('category_id',$cate['category_id']);
		
		echo "<p>";
		echo form_label('目录名',$cate['category_name']);
		echo form_input('category_name',$cate['category_name']);
		echo "</p>";
		
		echo "<p>";
		echo form_label('父级目录',$cate['parent_id']);
		$cates = $this->category_model->getAllCategory2();
		echo "<select name='parent_id'>";
		echo "<option value='0'>作为顶级分类</option>";
		$this->category_model->getTree2($cate['category_id'],$cate['parent_id'],$cates);
		echo "</select>";
		echo "</p>";
		
		echo "<p>";
		echo form_label('排序',$cate['ordernum']);
		echo form_input('ordernum',$cate['ordernum']);
		echo "</p>";
		echo form_submit('','提交更改');
		echo form_close();
	}

?>
</body>
</html>