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
body,td,th {
	font-family: ����;
	font-size: 12px;
	color: #75929F;

}
.STYLE1 {	color: #FF6600;
	font-weight: bold;
}
.faa {
	font-family: "����";
	font-size: 9pt;
	color: #000000;
	text-decoration: none;
}
.STYLE85 {
	color: #FFFFFF;
}
-->
</style>
</head>
<body>
   <table border="0" width="960" height="600" >
     <tr>
        <td>
        <?php
session_start(); 

//����Ƿ��¼����û��¼��ת���¼����
if(!isset($_SESSION['userid'])){
	header("Location:login.html");
	exit();
}
if($_SESSION['difference']==0)
exit('Ȩ�޲�����');
//�������ݿ������ļ�
include('conn.php');
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$user_query = mysql_query("select * from user where uid=$userid limit 1");
$row = mysql_fetch_array($user_query);
echo '�û���Ϣ��<br />';
echo '�û�ID��',$userid,'<br />';
echo '�û�����',$username,'<br />';
echo '���䣺',$row['email'],'<br />';
echo 'ע�����ڣ�',date("Y-m-d", $row['regdate']),'<br />';
echo '<a href="login.php?action=logout">ע��</a><br />';
?>      
        </td>
        <td></td>
        <td></td>
        <td align="right"><a href="order2.html"><font size="+3" color="#000000">��д����</font></a></td>
     </tr>
     <tr>
        <td></td>
        <td ></td>
        <td align="right"><a href="order3.html"><font size="+3" color="#000000">��ѯ����</font></a></td>
        <td></td>
     </tr>
     <tr>
        <td></td>
        <td align="right"><a href="order4.html"><font size="+3" color="#000000">�鿴����</font></a></td>
        <td></td>
        <td></td>
     </tr>
     <tr>
        
        <td align="right"><a href="index.php"><font size="+3" color="#000000">���Է���</font></a></td>
        <td></td>
        <td></td>
        <td></td>
        
     </tr> 
  </table>
</body>
</html>