<?php
/*
*action list
*/
?>
<p>
<?php 
	echo form_open('action/add');
?>
<fieldset style="width:80%;">
	<legend>操作列表</legend>
	<div>
		<table>
		<?php
			if($actions){
				foreach($actions as $action){
					?>
					<tr><td><input  type='checkbox' name='parent_id' value='<?=$action["id"] ?>' /><?=$action['action_info']."(".$action['action_code'].")"?></td></tr>
					<?php 
				}
			}else{
				echo "<p>没有内容</p>";
			}
		?>
		</table>
	</div>
</fieldset>
<?php
	
	echo "<p>";
	echo form_label('操作描述','action_info');
	echo form_input('action_info');
	echo "</p>";
	
	echo "<p>";
	echo form_label('操作标识码','action_code');
	echo form_input('action_code');
	echo "</p>";
	
	echo "<p>";
	echo form_submit('submit','提交'); 
	echo form_close(); 
	echo "</p>";
?>

</p>