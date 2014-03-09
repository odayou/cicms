<h2>Create a new item</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create') ?>

  <label for="title">Title</label> 
  <?php 
  $data = array(
  	"name" => "title",
    "placeholder" => "type your title",
    "required" => "required",
   	"min" => 5
  );
  echo  form_input($data);
  ?><br/>
 
  <label for="text">Text</label>
  <?php
		$data=array(
			"name" => "text",
			"placeholder" => "type your text",
			"required" => "required",
			"rows" => "8",
			"cols" => "60"
		);
		echo form_textarea($data);
  ?><br />
  
  <input type="submit" name="submit" value="Create news item" /> 

</form>