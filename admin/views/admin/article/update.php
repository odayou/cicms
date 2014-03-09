<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS——Codeigniter demo</title>
</head>
<body>
<script>
	function elementById(id){
		return document.getElementById(id);
	}
	//select 选择框选中多个值
	function selectedMore(selectObj,hiddenObj){
		var options = elementById(selectObj).options;
		var str = '';
		for(var i=0;i<options.length;i++){
			if(options[i].selected){
				str += options[i].value+',';
			}
		}
		
		if(str.length > 0){
			str = str.substring(0,str.length-1);
		}
		
		elementById(hiddenObj).value = str;
		
	}
</script>
<?
	if(!empty($result)){
		echo "<p>".$result."</p>";
	}


	if(!empty($news)){
		$js="onsubmit=selectedMore('category_id_select','category_id')";
		echo form_open("article/update",$js);
		echo form_hidden('action','update');
		echo form_hidden('id',$news['id']);
		
		echo "<p>";
		echo form_label('标题','title');
		echo form_input('title',$news['title']);
		echo "</p>";
		
		echo "<p>";
		echo form_label('所属分类(多选)','category_id');
		$cates = $this->category_model->getAllCategory2();
		echo "<select name='category_id_select' id='category_id_select' multiple='multiple' size='10'>";
		
		$category_id = explode(',',$news['category_id']);
		
		$this->category_model->getTree2($category_id,0,$cates);
		echo "</select>";
		echo "<input type='hidden' name='category_id' id='category_id'>";
		echo "</p>";
		
		echo "<p>";
		echo form_label('内容','text');
		
		//初始化内容编辑器
		$kineditor = array(
			'name' => 'text',
			'id' => "content_text",
			'value' => $news['text'],
			'style' => "width:100%"	//附加的样式，重置模板默认样式
			//other ...
		);
		$this->load->view('plugin/kindeditor1.4.7.1/kindeditor',$kineditor);
		
		echo "</p>";
		
		echo form_submit('','提交更改');
		echo form_close();
	}

?>

</body>
</html>