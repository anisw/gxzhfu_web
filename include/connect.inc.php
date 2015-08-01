<?php
if(!defined('IN_LQM')) {
	exit('Access Denied');
}
require_once (LQM_ROOT.'include/mysql.class.php');
$db = new dbstuff;
$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect, true, $dbcharset);
$dbuser = $dbpw = $dbname = $pconnect = NULL;

function closeDB()
{
	global $db;
	if (is_object($db))
	{
		$db->close();
		$db = NULL;
	}
}
?>	
