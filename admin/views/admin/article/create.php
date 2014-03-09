<p><h3>添加新闻</h3></p>
<p>
<?php
	echo "<p>". form_error('title').form_error('text')."</p>";
	
	echo form_open('article/create');
	echo "<p>";
	echo form_label('标题','title');
	echo form_input("title");
	echo "</p>";
	
	echo "<p>";
	echo form_label('内容','text');
	echo form_textarea("text");
	echo "</p>";
	
	echo form_submit('',"确认添加");
	echo form_close();
?>
</p>