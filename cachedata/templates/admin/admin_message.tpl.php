<? if(!defined('IN_LQM')) exit('Access Denied'); ?>
<title>系统提示</title>
<? include template('admin_header','0','admin'); ?>
<p>&nbsp;</p>
	<table width="500" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#003366">
		<tr class="header">
		  <td height="23">系统提示</td>
		</tr>
		<tr>
			<td align="center" bgcolor="#FFFFFF">
				<table border="0" width="90%" cellspacing="0" cellpadding="0">
				   <tr>
				   		<td align="center" class="smalltxt" style="line-height:23px">
							<br><?=$_TPL_message?>
							<? if($url_forward) { ?>
								<br><a href="<?=$url_forward?>">如果你的浏览器无法自动跳转,请单击这里转向新页面...</a><br>
							<? } elseif(strpos($_TPL_message, '返回')) { ?>
							
								<br><input name="return" type="button" onclick="history.go(-1)" value="返 回"><br>
							<? } ?>
						<br>

						</td>
				  </tr>
			</table>
		  </td>
		</tr>
</table>

    <br />
<br></p>
<? include template('admin_footer','0','admin'); ?>
