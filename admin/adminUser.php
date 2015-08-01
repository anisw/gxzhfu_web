<?

/*

	$Author: liqingmin

	

	$Date: 2007/12/18

	

	QQ:371191775

	

	MSN:cxkf@msn.com

*/	

if(!defined('LQM_DESA')) {



	exit(header("HTTP/1.1 404 Forbidden"));

	

}



if ($action == 'login'){  



	$adminuser = $_POST["username"];

	

	$password = $_POST["password"];


	

	if (!$adminuser || !$password) {

	

		adminmessage ("请输入用户名和密码后再登录","admin.php");

		

		die(0);

	}

	

	$_TPL_navtitle =  '系统提示';





	$adminuser = trim($adminuser);

	

	$password = md5(md5(md5($password)));

	



	/*echo $password;

	die();*/

	$query = $db->query("SELECT * FROM {$tablepre}members WHERE uname='$adminuser' AND upwd='$password'");

	

	$Uinfo = $db->fetch_array($query);

	

	if ($Uinfo) {

		

		$db->query("UPDATE {$tablepre}members SET logins=logins+1 WHERE uid=$Uinfo[uid];");

		$_SESSION['user']['uid'] = $Uinfo['uid'];
		
		$_SESSION['user']['uname'] = $Uinfo['uname'];
		
		$_SESSION['user']['pwd'] = $Uinfo['upwd'];

		adminmessage ("登陆成功！网站信息管理系统欢迎你的使用。","admin.php");

		die(0);

		

	}else{	

	

		adminmessage ("用户登陆错误，请检查你的用户名和密码是否正确","admin.php");

		

		die(0);

	}

}

if ($action == 'user_modify'){



	$_TPL_navtitle = '修改个人基本资料';

	

	if ($editsubmit){

	

			$name = $_POST[name];

			

			$newpassword = $_POST[newpassword];

			

			$oldpassword = $_POST[oldpassword];

			

			if (!$name) $name = $_SESSION['user']['uname'];

			

			if ($newpassword && $oldpassword) {

			

				$newpassword = md5(md5(md5($newpassword)));

				

				$oldpassword = md5(md5(md5($oldpassword)));

				

				if ($oldpassword == $_SESSION['user']['pwd']){ 

				

					$password = ",upwd='".$newpassword."'";

					

				}else{

				

					adminmessage ("您输入的旧密码不正确","?action=user_modify");

					die(0);

				}

					

				$sql = "UPDATE {$tablepre}members SET uname='$name' $password WHERE uid=".$_SESSION['user']['uid'];

			

				$query = $db->query($sql,true);

				

				adminmessage ("重新登录后才可以使用新的个人资料，","?action=main");

				

				die(0);

			}

			adminmessage ("对不起，输入的信息不完整.","?action=main");

				

			die(0);

	}else {

	

		include template("admin_user",0,"admin");

		

	}

			

}

?>

