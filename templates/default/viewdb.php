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
<table align="center">
   <tr colspan="3" align="center"><font size="+1" color="#FF0000"><a href="javascript:history.go(-2);">��������������</a></font>���Ķ�����Ϣ���£�</tr>
   <tr>
      <td height="400"></td>
      <td >
           <?php
header("Content-Type: text/html; charset=gbk");
$telephone=$_POST['telephone'];
$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('���ݿ�����ʧ��: ' . mysql_error());
  }
  else
  {
  mysql_query("SET NAMES gbk");
  mysql_query("set character_set_client=gbk"); 
  mysql_query("set character_set_results=gbk");
  mysql_select_db("sq_tpl_email", $con);
  $result = mysql_query("SELECT * FROM web_orderinfo where mobile='$telephone'",$con);
  //�ڱ���������ʾ���
echo " <table border='1' charset=gbk>
<tr charset=utf-8 >
<th>���</th>
<th>��Ʒ����</th>
<th>����</th>
<th>�۸�</th>
<th>����</th>
<th>�ֻ�</th>
<th>¥��</th>
<th>¥��</th>
<th>���Һ�</th>
<th>����ʱ��</th>
</tr>";

  while($row = mysql_fetch_array($result))
  {
 echo "<tr charset=gbk>";
 echo "<td>" . $row['id'] . "</td>";
 echo "<td>" . $row['model'] . "</td>";
 echo "<td>" . $row['buynum'] . "</td>";
 echo "<td>" . $row['price'] . "</td>";
 echo "<td>" . $row['name'] . "</td>";
 echo "<td>" . $row['mobile'] . "</td>";
 echo "<td>" . $row['sheng'] . "</td>";
 echo "<td>" . $row['shi'] . "</td>";
 echo "<td>" . $row['xian'] . "</td>";
 echo "<td>" . $row['addtime'] . "</td>";
 echo "</tr>";
  }
  echo "</table>";
}
mysql_close($con);
?>
      </td>
      <td></td>
   </tr>
   
</table>
	
	
</body>
</html>