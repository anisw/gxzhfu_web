<? if(!defined('IN_LQM')) exit('Access Denied'); ?>
<p>
<? include template('admin_header','0','admin'); ?>
<BR /><BR />
  <? if($action=="user_modify") { ?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="534" height="148" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#003366">
  <tr class="header">
      <td height="24" colspan="2" align="center">修改个人注册资料</td>
    </tr>
	<form method="post" action="?action=user_modify" name="user_modify">
    <tr>
	 <td width="16%" height="31" align="center" bgcolor="#FFFFFF" >用户名：</td>
      <td bgcolor="#FFFFFF" ><input name="name" type="text" id="name" size="25" value="<?=$session_admininfo['username']?>" class=txt_input> 
      修改后需要重新登录方可有效</td>
    </tr>
    <tr>
      <td height="28" align="center" bgcolor="#FFFFFF" >旧密码:</td>
      <td width="84%" bgcolor="#FFFFFF" ><input type="password" name="oldpassword" size="25" class=txt_input />        </td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF" >新密码:</td>
      <td bgcolor="#FFFFFF" ><input type="password" name="newpassword" size="25" class=txt_input /> 
      留空不修改密码</td>
    </tr>
    <tr>
      <td height="26" colspan="2" align="center" bgcolor="#cccccc" ><input type="submit" name="editsubmit" value="提交" style="cursor:pointer" class="button" /></td>
	</tr>
	</form>
</table>
<? } ?>
<BR /><BR /><BR /><BR />
<? include template('admin_footer','0','admin'); ?>
</html>
