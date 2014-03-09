<p><h3>添加分类</h3></p>
<p>
<?php
	echo "<p>". form_error('category_name')."</p>";
	
	echo form_open('category/create');
	echo "<p>";
	echo form_label('分类名','category_name');
	echo form_input("category_name");
	echo "</p>";
	
	echo "<p>";
	echo form_label('父级分类','parent_id');
?>
	<select name='parent_id'>
		<option value="0">作为顶级分类</option>
		<?php
			$cates = $this->category_model->getAllCategory2();
			foreach($cates as $item){
				echo "<option value='".$item['category_id']."'>";
				echo $item['category_name'];
				echo "</option>";
				if(isset($item['child'])){
					$this->category_model->getTree2(0,0,$item['child']);
				}
			}
		?>
	</select>
<?php
	echo "</p>";
	
	echo "<p>";
	echo form_label('排列顺序','ordernum');
	echo form_input("ordernum",'50');
	echo "</p>";
	
	echo form_submit('',"确认添加");
	echo form_close();
?>
</p>