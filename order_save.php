<?php



require_once ('./include/common.inc.php');

require_once ('./include/global.func.php');

if (!stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))
{
	echo '对不起，禁止外部提交数据!';
	
	die();
}

//////////////////////////////////////////

$model = $_POST['model'];

$number = intval($_POST['number']);

$price = sprintf('%01.2f',$_POST['price']);

$name = cutstr($_POST['name'],6);

$tele = cutstr($_POST['tel'],45);

$mobile = cutstr($_POST['mobile'],45);

$sheng = cutstr($_POST['sheng'],7);

$shi = cutstr($_POST['shi'],7);

$xian = cutstr($_POST['xian'],7);

$address = cutstr($_POST['address'],45);

$zipcode = $_POST['zipcode'];

$note = cutstr($_POST['note'],250);


//////////////////////////////////////////

if (!$model)
{
	echo '<script>alert("请输入型号！");history.go(-1);</script>';
	
	die();
}
if (!$name)
{
	echo '<script>alert("请输入姓名！");history.go(-1);</script>';
	
	die();
}
if (!$sheng)
{
	echo '<script>alert("请选择省份！");history.go(-1);</script>';
	
	die();
}

////////////////////////////////////////////////

include_once ('./include/connect.inc.php');

$sql = "INSERT INTO {$tablepre}orderinfo (model, buynum, price, name, tele, mobile, sheng, shi, xian, address, zipcode, note, addtime, ip) VALUES ('$model', $number, '$price', '$name', '$tele', '$mobile', '$sheng', '$shi', '$xian', '$address', '$zipcode', '$note', '$timestamp', '$onlineip')";

$db->query($sql,'UNBUFFERED');

CloseDB();

echo "<script>alert('在线下单提交成功！');location.href='index.php';</script>";

die();

?>

