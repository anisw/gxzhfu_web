<? if(!defined('IN_LQM')) exit('Access Denied'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$_TPL_navtitle?></title></head>
<script language="javascript">
<!--
if(self.parent.frames.length != 0) {
	self.parent.location=document.location;
}
function ctlent(){
	if(window.event.keyCode==13){
		onlogin();
	}
}
function onlogin(){
	if(0==document.getElementById("username").value.length){
		alert("����д��¼�û���");
		document.getElementById("username").focus();
		return;
	}else if(0==document.getElementById("password").value.length){
		alert("����д��¼����");
		document.getElementById("password").focus();
		return;
	}else{
		document.login.submit();
	}
}
-->
</script>
<style type="text/css">
a:link,a:visited { 
	text-decoration: none;
	color: #000000
 }
a:hover	{
	text-decoration: underline;
	color: #FF6633;
}
body{ 
	font-size: 12px;
}
table	{ 
	font-family: Tahoma, Verdana; 
	color: #000031; 
	font-size: 12px
}
.header	{ 
	font-family: Tahoma, Verdana; 
	font-size: 12px; 
	color: #FFFFFF; 
	font-weight: 700;/* background-image: url(templates/admin/images/header_bg.gif)*/ 
	background:#0998CB
}
.button{
	margin-right: 1em; 
	border: 1px solid; 
	border-color: #FFFDEE #FDB939 #FDB939 #FFFDEE; 
	background: #FFF8C5; 
	color: #090; 
	padding: 0 10px; 
	cursor:pointer;
	height:20px;
}
.txt_input{ 
	border-width: 1px;
	background: #FFF; 
	border-color: #DDD;
	padding: 2px;
 }
</style>
<body>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr valign="middle" bgcolor="#FFFFFF">
	<td width="8%" height="22">[<a href="./" target=_blank>ǰ̨��ҳ</a>]</td>
	<td width="51%" ><hr></td>
	<td width="41%" bgcolor="#666666" ><div align="center"><font color=white><b><?=$_TPL_navtitle?></b></font></div></td>
	</tr>
	</table>
	<br><br>
	<br><br>

<form method="post" action="admincp.php?action=login" name="login">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="372" height="76" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" class=out_black>
	<tr class="header">
		<td height="100" colspan="2" align="center" ><font size="+3">����Ա��¼</font></td>
	</tr>
	<tr>
		<td width="33%" height="26" bgcolor="#FFFFFF"><font size="+2">�û���:</font></td>
		<td bgcolor="#FFFFFF"><input name="username" type="text" class="txt_input" tabindex="1" size="25" maxlength="40" style="width:200px;"></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF"><font size="+2">�� ��:</font></td>
		<td bgcolor="#FFFFFF"><input type="password" name="password" size="25" tabindex="2" onKeyDown='ctlent()' class="txt_input" style="width:200px;"></td>
	</tr>
	<tr>
	  <td colspan="2" bgcolor="#FFFFFF">
	  	<center><input type="submit" name="loginsubmit" value="��¼" style="cursor:pointer;" class="button" onClick="if(login.username.value=='' || login.password.value==''){alert('�������û�����������.');return false;}"/></center>
		
      </td>
	</tr>
</table>
</form>
<br><br>
<? include template('admin_footer','0','admin'); ?>
