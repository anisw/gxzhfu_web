<?php



require_once ('./include/common.inc.php');

require_once ('./include/global.func.php');


define('LQM_DESA', true);



if(!$_SESSION['user']['uid'] && !$_SESSION['user']['uname'] && $action != 'login'){

	$_TPL_navtitle = "����Ա��½";

	include template('admin_login',0,'admin');

	exit();

}

include_once ('./include/connect.inc.php');

switch ($action){

	case main:

		$_TPL_navtitle="�鿴�û���ϵͳ��Ϣ";

		$_TPL_serverinfo = PHP_OS.' / PHP v'.PHP_VERSION;

		$_TPL_serverinfo .= @ini_get('safe_mode') ? ' ��ȫģʽ' : NULL;

		$_TPL_dbversion = $db->result($db->query("SELECT VERSION()"), 0);

		if(@ini_get("file_uploads")) {

			$_TPL_fileupload = "���� - �ļ� ".ini_get("upload_max_filesize")." - ����".ini_get("post_max_size");

		} else {

			$_TPL_fileupload = "<font color=\"red\">��ֹ</font>";

		}

		$_TPL_dbsize = 0;

		$query = $db->query("SHOW TABLE STATUS LIKE '$table%'", 'SILENT');

		while($table = $db->fetch_array($query)) {

			$_TPL_dbsize += $table['Data_length'] + $table['Index_length'];

		}

		$_TPL_dbsize = $_TPL_dbsize ? sizecount($_TPL_dbsize) : 'δ֪';

		include template('admin_main',0,'admin');

		break;

	case menu:

		include template('admin_menu',0,'admin');

		break;

	case ydate:

		include $RootDir.'admin/adminDate.php';

		break;

	case user_modify:

	case login:

		include $RootDir.'admin/adminUser.php';

		break;

	case order:

		include $RootDir.'admin/adminOrder.php';

		break;
	
	case email:
	
		include $RootDir.'admin/adminEmail.php';

		break;
		
	case payinfo:
		
		include $RootDir.'admin/adminPay.php';

		break;
		
	case user_logout:

		$db->query("UPDATE {$tablepre}members SET lastip='$onlineip',lastvisit='$timestamp' WHERE uid=".$_SESSION['user']['uid'],'UNBUFFERED');

		$_SESSION['user']['uid'] = $_SESSION['user']['uname'] =  $_SESSION['user']['upwd'] = '';

		unset($_SESSION['user']);

		echo '<script>location.href="admin.php";</script>';

		break;

	default:

		adminmessage('�Բ��𣬴˲���û�ж���!<BR>');

}

CloseDB();

?>

