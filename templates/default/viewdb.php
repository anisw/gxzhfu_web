	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>在线提交订单</title>
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
   <tr colspan="3" align="center"><font size="+1" color="#FF0000"><a href="javascript:history.go(-2);">》》返回主界面</a></font>您的订单信息如下：</tr>
   <tr>
      <td height="400"></td>
      <td >
           <?php
header("Content-Type: text/html; charset=gbk");
$telephone=$_POST['telephone'];
$con = mysql_connect("localhost","root","123456");
if (!$con)
  {
  die('数据库连接失败: ' . mysql_error());
  }
  else
  {
  mysql_query("SET NAMES gbk");
  mysql_query("set character_set_client=gbk"); 
  mysql_query("set character_set_results=gbk");
  mysql_select_db("sq_tpl_email", $con);
  $result = mysql_query("SELECT * FROM web_orderinfo where mobile='$telephone'",$con);
  //在表格中输出显示结果
echo " <table border='1' charset=gbk>
<tr charset=utf-8 >
<th>序号</th>
<th>商品类型</th>
<th>数量</th>
<th>价格</th>
<th>姓名</th>
<th>手机</th>
<th>楼号</th>
<th>楼层</th>
<th>寝室号</th>
<th>订单时间</th>
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