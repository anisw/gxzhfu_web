<?
session_start();

require_once ('./include/common.inc.php');

require_once ('./include/global.func.php');


if(!$_SESSION['user']['uid'] || !$_SESSION['user']['uname']){

	$_TPL_navtitle = "管理员登陆";

	include template('admin_login',0,'admin');

	exit();

}else{

	echo '

		<html>

		<head>

		<title>后台管理面板</title>

		<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

		</head>

		<frameset cols="160,*" frameborder="no" border="0" framespacing="0" rows="*"> 

		<frame name="menu" noresize scrolling="yes" src="admincp.php?action=menu">

		<frame name="main" noresize scrolling="yes" src="admincp.php?action=main">

		</frameset><noframes></noframes>

		</html>';

}

?>

