<?php
include("class.phpmailer.php");
include("class.smtp.php"); 

//你只需填写以下信息即可****************************

$smtp = "smtp.qq.com";//必填，设置SMTP服务器 QQ邮箱是smtp.qq.com ，QQ邮箱默认未开启，请在邮箱里设置开通。网易的是 smtp.163.com 或 smtp.126.com

$youremail =  '819967765@qq.com'; // 必填，开通SMTP服务的邮箱；也就是发件人Email。(本系统功能也就是自己给自己发邮件)
$password = "1579948154"; //必填， 以上邮箱对应的密码

$ymail = "597994911@qq.com"; //收信人的邮箱地址，也就是你自己收邮件的邮箱

$yname = "魏琳琳"; //收件人称呼

//填写信息结束 ****************************

function get_ip(){
   if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
       $ip = getenv("HTTP_CLIENT_IP");
   else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
       $ip = getenv("HTTP_X_FORWARDED_FOR");
   else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
       $ip = getenv("REMOTE_ADDR");
   else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
       $ip = $_SERVER['REMOTE_ADDR'];
   else
       $ip = "unknown";
   return($ip);
}

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true; 
$mail->Host = $smtp; 


$mail->Username = $youremail; 
$mail->Password = $password; //必填， 以上邮箱对应的密码

$mail->From = $youremail; 
$mail->FromName = "反馈系统"; 

$mail->AddAddress($ymail,$yname);

if($_POST['add']=='1'){
	$yourname = $_POST['yourname'];
	$tel = $_POST['tel'];
	$qq = $_POST['qq'];
	$email = $_POST['email'];


	$message = $_POST['message'];
	
	$ip = get_ip();
	
	$mail->Subject = $yourname."-【留言反馈】"; 
	date_default_timezone_set('Asia/Shanghai');
	$time = date("Y-m-d H:i:s",time());

	
	$html = '姓名：'.$yourname.'<br>电话：'.$tel.'<br>QQ：'.$qq.'<br>邮箱：'.$email.'<br>IP：'.$ip.'<br>提交时间：'.$time.'<br>内容：'.$message;
	
	$mail->MsgHTML($html);
	
	$mail->IsHTML(true); 

	if(!$mail->Send()) {
		//header("Content-Type: text/html; charset=utf-8");

		echo '<script>alert("提交失败了！");history.go(-1);</script>';
	} else {
		//header("Content-Type: text/html; charset=utf-8");
	    echo '<script>alert("提交成功！感谢你的反馈。");history.go(-1);</script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言反馈 - By huoduan.com</title>
<style>
body{font-size:14px; font-family:tahoma; background-image:url(images/cjlu1400.jpg);}
a{color:#000;}
a:hover{color:#f60;}
.red{color:#F00;}
#header,#content,#footer{width:760px; margin:0 auto;}
#header h1{ font-size:36px; color:#075CB1; float:left; margin-bottom:10px; overflow:hidden;}
#header{border-bottom:3px solid #075CB1;margin-bottom:10px;}

#header .gg{ float:right;text-align:right; font-size:12px; width:386px; margin:10px 10px 0 0; color:#999;}

#content{margin-bottom:10px;}
#content .title{width:760px; height:100px;border:1px solid #b1c1e2; border-bottom:0; font-weight:bold; background:#ecedf8; text-align:center; position:relative; bottom:-1px; line-height:2em; z-index:9;}
#content .main{border:0px solid ; background:#000; position:relative;}

#content form{margin:8px; background:#fff; padding:10px 0;}
#content .tip{font-size:12px; color:#666;}
#footer{border-top:3px solid #075CB1; position:relative; background:#f5f5f5; padding-top:8px; text-align:center; font-size:12px; color:#999; margin-bottom:10px;}
#footer a{ color:#666}

</style>
<script type="text/javascript">
function G(id){
   return document.getElementById(id);	
}
function ck(){
   if(G('yourname').value == ''){
	alert("姓名不能为空！");
	G('yourname').focus();
	return false;
   }
   if(G('message').value == ''){
	alert("内容不能为空！");
	G('message').focus();
	return false;
   }
}
</script>

</head>

<body>
<br /><br />
<div id="header">
	<h1>
		留言反馈
</h1>
</div>

<div id="content">
	<div class="title" ><br />
    <font size="6">留言反馈</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <font size="+1" color="#FF0000"> <a href="javascript:history.go(-1);"> 》》返回主界面</a></font>
    </div>
	<div class="main">

		<form action="" method="post" onsubmit="return ck();">

			<table width="100%" cellspacing="0" cellpadding="5" border="0">
				<tbody>
				<tr valign="top">
					<td width="22%" align="right" valign="middle" class="field">姓名:</td>
					<td valign="middle">
						<input type="text" maxlength="40" size="26" id="yourname" name="yourname" /> <font color="red">*</font>
						<span class="tip">姓名或昵称</span>
                    </td>
                </tr>
                <tr valign="top">
                    <td valign="middle" align="right" class="field">邮箱:</td>
                    <td>
						<input type="text" maxlength="40" size="26" id="email" name="email" />  
						<span class="tip">您的Email地址（建议填写）</span>
                    </td>
                </tr>
                
				<tr valign="top">
					<td valign="middle" align="right" class="field">QQ号码:</td>
					<td>
						<input type="text" maxlength="40" size="26" id="qq" name="qq" /> 
						<span class="tip">您的QQ号码</span>
					</td>
				</tr>
                
				<tr valign="top">
					<td valign="middle" align="right" class="field">联系电话:</td>
					<td>
						<input type="text" maxlength="15" size="26" id="tel" name="tel" /> 
						<span class="tip">电话或手机号</span>
					</td>
				</tr>
                
				<tr valign="top">
					<td valign="middle" align="right" class="field">内容:</td>
					<td>
						<textarea name="message" id="message" cols="60" rows="7"></textarea> <font color="red">*</font>
                    </td>
                </tr>
                
                <tr valign="top">
					<td class="field"></td>
					<td><input name="add" type="hidden" value="1" />
						<input type="submit" value="提 交" /> <font color="red"><?php echo $ok; ?></font>
					</td>
                </tr>
                </tbody>
			</table>
		</form>
	</div>
</div>

<div id="footer">
<a href="http://www.huoduan.com" target="_blank">JJSWST</a></div>
<span style="display:none"><script language="javascript" type="text/javascript" src="http://js.users.51.la/3241088.js"></script>

</span>
</body>
</html>
