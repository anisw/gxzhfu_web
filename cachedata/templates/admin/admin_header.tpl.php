<? if(!defined('IN_LQM')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="./css/css.css" rel="stylesheet" type="text/css">
<? include template('css','0','admin'); ?>
<?=$_TPL_url_redirect?>
<script language="javascript">
function checkall(form) {
	for(var i = 0;i < form.elements.length; i++) {
		var e = form.elements[i];
		if (e.name != 'chkall' && e.disabled != true) {
			e.checked = form.chkall.checked;
		}
	}
}
</script>
</head>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr valign="middle" bgcolor="#FFFFFF">
<td width="8%" height="22">[<a href="./" target=_blank>ǰ̨��ҳ</a>]</td>
<td width="51%" ><hr color="#999999"size="4"></td>
<td width="41%" height="30" bgcolor="#666666" ><div align="center"><font color=white><b><?=$_TPL_navtitle?></b></font></div></td>
</tr>
</table>
<br><br>
<? if($_TPL_submenu) { ?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#003366">
   <tr bgcolor="#CCCCCC">
    <td width="99%" height="24"><span style="float:right"><?=$_TPL_select?></span><?=$_TPL_submenu?></td>
</tr>
</table>
<? } ?>

