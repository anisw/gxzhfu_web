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

	

		adminmessage ("�������û�����������ٵ�¼","admin.php");

		

		die(0);

	}

	

	$_TPL_navtitle =  'ϵͳ��ʾ';





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

		adminmessage ("��½�ɹ�����վ��Ϣ����ϵͳ��ӭ���ʹ�á�","admin.php");

		die(0);

		

	}else{	

	

		adminmessage ("�û���½������������û����������Ƿ���ȷ","admin.php");

		

		die(0);

	}

}

if ($action == 'user_modify'){



	$_TPL_navtitle = '�޸ĸ��˻�������';

	

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

				

					adminmessage ("������ľ����벻��ȷ","?action=user_modify");

					die(0);

				}

					

				$sql = "UPDATE {$tablepre}members SET uname='$name' $password WHERE uid=".$_SESSION['user']['uid'];

			

				$query = $db->query($sql,true);

				

				adminmessage ("���µ�¼��ſ���ʹ���µĸ������ϣ�","?action=main");

				

				die(0);

			}

			adminmessage ("�Բ����������Ϣ������.","?action=main");

				

			die(0);

	}else {

	

		include template("admin_user",0,"admin");

		

	}

			

}

?>

