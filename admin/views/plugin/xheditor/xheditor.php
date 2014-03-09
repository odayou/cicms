<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<title>编辑器</title>
<script type="text/javascript" src=<?php echo base_url()."include/xhedit1.1.0/jquery/jquery-1.4.2.min.js"?>></script>
<script type="text/javascript" src=<?php echo base_url()."include/xhedit1.1.0/xheditor-zh-cn.min.js?v=1.1.1"?>></script>
<script type="text/javascript">
$(pageInit);
function pageInit()
{
	$('#w_content').xheditor({skin:'nostyle',tools:'Cut,Copy,Paste,Pastetext,|,Blocktag,Fontface,FontSize,Bold,Italic,Underline,Strikethrough,FontColor,BackColor,SelectAll,Removeformat,|,Align,List,Outdent,Indent,|,Link,Unlink,|,Img,Flash,Media,Table,|,Source,Fullscreen,About',upLinkUrl:<?php echo "\"".site_url("welcome/upload")."\""?>,upLinkExt:"zip,rar,txt",upImgUrl:<?php echo "\"".site_url("welcome/upload")."\""?>,upImgExt:"jpg,jpeg,gif,png",upFlashUrl:<?php echo "\"".site_url("welcome/upload")."\""?>,upFlashExt:"swf",upMediaUrl:<?php echo "\"".site_url("welcome/upload")."\""?>,upMediaExt:"wmv,avi,wma,mp3,mid",shortcuts:{'ctrl+enter':submitForm}});
}
function insertUpload(arrMsg)
{
	var i,msg;
	for(i=0;i<arrMsg.length;i++)
	{
		msg=arrMsg[i];
		$("#uploadList").append('<option value="'+msg.id+'">'+msg.localname+'</option>');
	}
}
function submitForm(){$('#frmDemo').submit();}
</script>

<style>
			form {
				margin: 0;
			}
			textarea {
				display: block;
			}
		</style>
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
<form id="frmDemo" method="post" action="show.php">
	<h3>xhEditor demo8 : Ajax文件上传</h3>
	1,普通上传模式:<br />
	<textarea id="w_content" name="w_content" style="width:700px;height:400px;"></textarea><br /><br />
	<br /><br />上传文件列表：<select id="uploadList" style="width:350px;"></select>
	<br/><br />
	<input type="submit" name="save" value="Submit" />
	<input type="reset" name="reset" value="Reset" />
</form>
</body>
</html>