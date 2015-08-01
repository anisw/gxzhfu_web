<?php

if(!defined('IN_LQM')) {
	exit('Access Denied');
}

$timestamp = time();
$errmsg = '';

$dberror = $this->error();
$dberrno = $this->errno();

if($dberrno == 1114) {
?>
<html>
<head><title>Max onlines reached</title><meta http-equiv="Content-Type" content="text/html; charset=gb2312"></head>
<body>
<table cellpadding="0" cellspacing="0" border="0" width="500" height="90%" align="center" style="font-family: Verdana, Tahoma;font-size: 9px;color: #000000">
<tr><td height="50%">&nbsp;</td></tr><tr><td valign="middle" align="center" bgcolor="#EAEAEA">
<br><b style="font-size: 11px;">Forum onlines reached the upper limit</b><br><br><br>Sorry, the number of online visitors has reached the upper limit.<br>Please wait for someone else going offline or visit us in idle hours.<br><br></td>
</tr><tr><td height="50%">&nbsp;</td></tr></table>
</body>
</html>
<?
exit;
} else {

	if($message) {
		$errmsg = "<b>LQM! info</b>: $message\n\n";
	}
	$errmsg .= "<b>Time</b>: ".gmdate("Y-n-j g:ia", $timestamp + ($GLOBALS['timeoffset'] * 3600))."\n";
	$errmsg .= "<b>Script</b>: ".$GLOBALS['PHP_SELF']."\n\n";
	if($sql) {
		$errmsg .= "<b>SQL</b>: ".htmlspecialchars($sql)."\n";
	}
	$errmsg .= "<b>Error</b>:  $dberror\n";
	$errmsg .= "<b>Errno.</b>:  $dberrno";
	echo "</table></table></table></table></table>\n";
	echo "<p style=\"font-family: Verdana, Tahoma; font-size: 11px; background: #FFFFFF;\">";
	echo nl2br($errmsg);
	echo '<br><br>Similar error report has beed dispatched to administrator before.';
	echo '</p>';
	exit;
}
?>