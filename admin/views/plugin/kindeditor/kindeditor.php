<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<title>编辑器</title>
<script type="text/javascript" src=<?php echo base_url()."include/xhedit1.1.0/jquery/jquery-1.4.2.min.js"?>></script>
<script charset="utf-8" type="text/javascript" src=<?php echo base_url()."include/kindeditor/kindeditor.js"?>></script>

<style>
			form {
				margin: 0;
			}
			textarea {
				display: block;
			}
		</style>
		<script>
			KE.show({
				id : "<?=$id?>",
				allowFileManager : true,
				imageUploadJson : '../../php/upload_json.php'
			});
		</script>
<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

			<textarea id="<?=$id?>" name="<?=$name?>" style="width:700px;height:300px;visibility:hidden;<?=$style?>">
<?=$value?>
			</textarea>
	

</body>
</html>