<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS——Codeigniter demo</title>
</head>
<body>
<link href="<?php echo base_url().$this->config->item("files_admin");?>css/menu.css" rel="stylesheet"/>

<table width="165" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="28" background="<?php echo base_url().$this->config->item("files_admin"); ?>images/main_40.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="19%">&nbsp;</td>
        <td width="81%" height="20"><span class="STYLE1">管理菜单</span></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td valign="top"><table width="151" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
	$i=0;
	foreach($leftmenu as $key=>$value){//循环主菜单项
?>
 	 <tr class="leftmenu-list">
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="23" id="imgmenu<?=$i?>" class="menu_title" onclick="showsubmenu(<?=$i?>)"><?=$key?></td>
          </tr>
          <tr>
            <td class="leftmenu-list-body" id="submenu<?=$i?>"><div class="sec_menu" >
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
 <?php
			foreach($value as $k1=>$v1){//循环菜单子项
?>
						 <tr>
                          <td class="menu-list">
                              <a href="<?=$v1['url']?>" class="menu-list-a" target="bodyFrame"><?=$k1?></a>
                          </td>
                        </tr>
<?php				
			}//循环菜单子项 END
 ?>
         </table></td>
                  </tr>
                </table>
            </div></td>
          </tr>
        </table></td>
      </tr>
	
<?php
	$i++;
	}//循环主菜单项 END
?>
    </table></td>
  </tr>
  <tr>
    <td height="18" background="<?php echo base_url().$this->config->item("files_admin"); ?>images/main_58.gif"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="18" valign="bottom"><div align="center" class="STYLE3">版本：2013V1.0开发版</div></td>
      </tr>
    </table></td>
  </tr>
</table>

<script>
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
imgmenu = eval("imgmenu" + sid);
if (whichEl.style.display == "none")
{
eval("submenu" + sid + ".style.display=\"\";");
imgmenu.background="<?php echo base_url().$this->config->item("files_admin"); ?>images/main_47.gif";
}
else
{
eval("submenu" + sid + ".style.display=\"none\";");
imgmenu.background="<?php echo base_url().$this->config->item("files_admin"); ?>images/main_48.gif";
}
}

</script>
</body>
</html>