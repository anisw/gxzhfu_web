<? if(!defined('IN_LQM')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">

<!--

.style1 {font-weight: bold}

td { color:#fff; padding-left:10px; }

#menu a { color:#000;}

#menu a:visited { color:#000;}

.header td { line-height:18px; cursor:pointer; }

-->

</style>
<? include template('css','0','admin'); ?>
<script language="javascript">

	function showmenu(layerid){

		var hidden_layer = document.getElementById(layerid);

	    hidden_layer.style.display = hidden_layer.style.display==''?'none':''

	}



</script>

</head>

<table width="100%" border="0" cellpadding="3" cellspacing="2" id="menu">

  <tr> 

    <td height="35" bgcolor="#666666"><span class="style1">系统管理菜单</span></td>

  </tr>

  <? if($_SESSION['user']['uname']) { ?>

  <tr> 

    <td height="35" bgcolor="#f0f0f0" style="color:#000;">

		用户：<?=$_SESSION['user']['uname']?>

    </td>

  </tr>

  <tr> 

    <td height="35" bgcolor="#6699CC"><a href="?action=user_modify" target="main" style="color:#000">修改资料</a></td>

  </tr>

  <tr> 

    <td height="35" bgcolor="#6699CC"><a href="?action=main" target="main" style="color:#000">系统信息</a></td>

  </tr>
 <tr> 

    <td height="35" bgcolor="#6699CC"><a href="?action=order" target="main" style="color:#000">订单管理</a></td>

  </tr>

  
 <tr> 

    <td height="35" bgcolor="#6699CC"><a href="admin/mysql.php" target="main" style="color:#000">备份数据库</a></td>

  </tr>
  <tr> 

    <td height="35" bgcolor="#6699CC"><a href="?action=user_logout" target="_top" style="color:#000">退出系统</a></td>

  </tr>

  </tbody>

  <? } ?>

</table>

</body>

</html>

