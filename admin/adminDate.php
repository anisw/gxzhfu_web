<?php
/*
	$Author: liqingmin
	
	$Date: 2009/12/02
	
	QQ:371191775
	
	MSN:cxkf@msn.com
*/	

if(!defined('LQM_DESA')) {

	exit(header("HTTP/1.1 404 Forbidden"));
	
}
$_TPL_navtitle = "���ݿ��Ż�";

$query = $db->query("SHOW TABLE STATUS LIKE '".$tablepre."%'");

while($table = $db->fetch_array($query))
{
	$tablename = $table[Name];
	if(!$tablename) {
		$tablename = "δ�Ż�";
	} else {
		$tablename = "�Ż�";
		$db->query("OPTIMIZE TABLE $table[Name]");
	}
	$_TPL_list[] = $table;

}

include template('admin_data',0,'admin');
			
?>