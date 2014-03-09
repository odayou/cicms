<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS——Codeigniter demo</title>
</head>
<frameset rows="98,*,2" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo site_url("templates/index/top");?>" name="topFrame" scrolling="no" noresize="noresize" id="topFrame"></frame>
  
  <frameset cols="13%,*">
	  <frame src="<?php echo site_url("index/left");?>" name="leftFrame" id="leftFrame" noresize="noresize"></frame>
	  <frame src="<?php echo site_url("index/body");?>" name="bodyFrame" id="bodyFrame" noresize="noresize"></frame>
  </frameset>
  <frame src="<?php echo site_url("index/footer");?>" name="bottomFrame" scrolling="no" noresize="noresize"></frame>
</frameset>
<noframes><body>浏览器不支持frame框架</body></noframes>
</html>
