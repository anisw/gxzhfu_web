<? if(!defined('IN_LQM')) exit('Access Denied'); include template('admin_header','0','admin'); ?>
<BR />
<br>
<table  width="100%" border="0" cellpadding="4" cellspacing="1">
<tr >
  <td colspan="2"><img src="templates/admin/images/ban1.jpg" width="1185" height="172" /></td>
</tr>
<tr class="header"><td height="23" colspan="2">系 统 信 息</td>
</tr>
<tr ><td width="50%">服务器环境</td><td><?=$_TPL_serverinfo?></td>
</tr>
<tr ><td>MySQL 版本</td><td><?=$_TPL_dbversion?></td>
</tr>
<tr ><td>附件上传许可</td><td><?=$_TPL_fileupload?></td>
</tr>
<tr >
  <td>当前数据库尺寸</td>
  <td><?=$_TPL_dbsize?></td>
</tr>
</table>
<br>
<br>
<? include template('admin_footer','0','admin'); ?>
