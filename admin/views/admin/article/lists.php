<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="<?php echo base_url().$this->config->item('files')."js/jquery-1.7.2.min.js";?>"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE1 {font-size: 12px}
.STYLE3 {font-size: 12px; font-weight: bold; }
.STYLE4 {
	color: #03515d;
	font-size: 12px;
}
-->
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("files_admin");?>css/conn.css"/>
<script>
var  highlightcolor='#c1ebff';
//此处clickcolor只能用win系统颜色代码才能成功,如果用#xxxxxx的代码就不行,还没搞清楚为什么:(
var  clickcolor='#51b2f6';
function  changeto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=highlightcolor&&source.id!="nc"&&cs[1].style.backgroundColor!=clickcolor)
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=highlightcolor;
}
}

function  changeback(){
if  (event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="nc")
return
if  (event.toElement!=source&&cs[1].style.backgroundColor!=clickcolor)
//source.style.backgroundColor=originalcolor
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}

function  clickto(){
source=event.srcElement;
if  (source.tagName=="TR"||source.tagName=="TABLE")
return;
while(source.tagName!="TD")
source=source.parentElement;
source=source.parentElement;
cs  =  source.children;
//alert(cs.length);
if  (cs[1].style.backgroundColor!=clickcolor&&source.id!="nc")
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor=clickcolor;
}
else
for(i=0;i<cs.length;i++){
	cs[i].style.backgroundColor="";
}
}

$(function (){

});
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" background="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tab_05.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12" height="30"><img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tab_03.gif" width="12" height="30" /></td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="46%" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5%"><div align="center"><img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tb.gif" width="16" height="16" /></div></td>
                <td width="95%" class="STYLE1"><span class="STYLE3">你当前的位置</span>：[业务中心]-[我的邮件]</td>
              </tr>
            </table></td>
            <td width="54%"><table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td width="60"><table width="87%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center">
                      <input type="checkbox" name="checkbox62" value="checkbox" />
                    </div></td>
                    <td class="STYLE1"><div align="center">全选</div></td>
                  </tr>
                </table></td>
                <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/22.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center"><a href='create'>新增</a></div></td>
                  </tr>
                </table></td>
                <td width="60"><table width="90%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/33.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center">修改</div></td>
                  </tr>
                </table></td>
                <td width="52"><table width="88%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="STYLE1"><div align="center"><img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/11.gif" width="14" height="14" /></div></td>
                    <td class="STYLE1"><div align="center">删除</div></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"><img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tab_07.gif" width="16" height="30" /></td>
      </tr>
    </table></td>
  </tr>

  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8" background="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tab_12.gif">&nbsp;</td>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="b5d6e6" onmouseover="changeto()"  onmouseout="changeback()">
          <tr background="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/bg.gif" bgcolor="#FFFFFF">
            <td width="3%" height="22"><input type="checkbox" name="checkbox" value="checkbox" /></td>
            <td width="3%">序号</td>
            <td width="10%">标题</td>
            <td>分类</td>
            <td width="50%">简介</td>
            <td>发布时间</td>
            <td>基本操作</td>
          </tr>
           <?php
            /*news列表*/
		
            foreach($news as $item){
           ?>
            <tr class="list-article">
            <td><input type="checkbox" name="checkbox2" value="<?=$item['id']?>" /></td>
				<td><?=$item['id']?></td>
				<td><?=$item['title']?></td>
				<td><?=$item['category_id']==""?'默认分类':$item['category_id']?></td>
				<td><?//=$item['text']?></td>
				<td></td>
				<td>
					<span class="btn_edit"><a href="/<?php echo $this->config->item('index_page');?>/article/update/<?=$item['id']?>">编辑</a></span>
					<span class="btn_delete"><a href='/<?php echo $this->config->item('index_page');?>/article/delete/<?=$item['id']?>'>删除</a></span>
				</td>
            </tr>
           <?php
            }
           ?>
        </table></td>
        <td width="8" background="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tab_15.gif">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr class="pagebar">
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12"><img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tab_18.gif" width="12"/></td>
         <td class="STYLE4" >&nbsp;&nbsp;每页 <b><?php echo $page['num']; ?></b> 条  / 计 <b><?php echo $page['page']; ?></b> 页 / 共 <b><?php echo $page['total']; ?></b> 条</td>
         <td style="margin-right:0px;"><?php 	echo  $this->pagination->create_links();?></td>
        <td width="12">
		<img src="<?php echo base_url().$this->config->item("files_admin"); ?>images/tab/tab_20.gif" width="16"/></td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</body>
</html>