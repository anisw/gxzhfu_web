<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����ύ����</title>
<style type="text/css">
<!--
body {
	background-image:url(./images/cjlu801.jpg);
	background-repeat:no-repeat;
}
</style>
</head>
<body>
<?php
header("Content-Type:text/html;   charset=gb2312"); 
session_start();

//ע����¼
if($_GET['action'] == "logout"){
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	echo 'ע����¼�ɹ�������˴� <a href="order1.html">��¼</a>';
	exit;
}

//��¼
if(!isset($_POST['submit'])){
	exit('�Ƿ�����!');
}
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);

//�������ݿ������ļ�
include('conn.php');
//����û����������Ƿ���ȷ
$check_query = mysql_query("select uid,differ from user where username='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){
	//��¼�ɹ�
	$_SESSION['username'] = $username;
	$_SESSION['userid'] = $result['uid'];
	$_SESSION['difference']=$result['differ'];
	echo $username,' ��ӭ�㣡���� <a href="my.php">�û�����</a><br />';
	echo '����˴� <a href="login.php?action=logout">ע��</a> ��¼��<br />';
	exit;
} else {
	exit('��¼ʧ�ܣ�����˴� <a href="javascript:history.back(-1);">����</a> ����');
}
?>
</body>
</html>