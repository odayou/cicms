<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<title>编辑器</title>
<script charset="utf-8" type="text/javascript" src=<?php echo base_url()."include/kindeditor-4.1.7/kindeditor.js"?>></script>
<script charset="utf-8" type="text/javascript" src=<?php echo base_url()."include/kindeditor-4.1.7/lang/zh_CN.js"?>></script>


<style>
			form {
				margin: 0;
			}
			textarea {
				display: block;
			}
		</style>
		<script>
			
			var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#<?=$id?>', {
                        resizeType : 2,
						allowFileManager : true,
                        uploadJson : '/include/kindeditor-4.1.7/php/upload_json.php'
                });
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