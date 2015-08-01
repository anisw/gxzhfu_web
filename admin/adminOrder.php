<?php
/*
	$Author: liqingmin
	
	$Date: 2009/12/02
	
	QQ:371191775
	
	MSN:cxkf@msn.com
*/	

if(!defined('LQM_DESA')) {

	exit('无权操作');
	
}


$_TPL_navtitle = "订单管理";

//////////////////////////////////////////
if ($operation == 'del')
{
	
	$db->query("DELETE FROM {$tablepre}orderinfo WHERE id=".intval($id),true);
	
	adminmessage('操作成功！',$_SERVER['HTTP_REFERER']);
	
	die();

}
/////////////////////////////////////////
elseif ($operation == 'vieworder')
{
	$id = intval($id);
	
	$sql = "SELECT * FROM {$tablepre}orderinfo WHERE id=$id";	
	
	$query = $db->query($sql);
	
	$info = $db->fetch_array($query);
	
	$info['addtime'] = date('Y-m-d H:i:s',$info['addtime']);	
	
}
/////////////////////////////////////////////////////
else
{
	if ($editsubmit)
	{
		if (is_array($delids))
		{
			$ids = implode(',',$delids);
			
			$db->query("DELETE FROM {$tablepre}orderinfo WHERE id IN ($ids)",true);
	
			adminmessage('操作成功！',$_SERVER['HTTP_REFERER']);
			
			die();
			
		}
	}
	
	////////////////////////////////////////////////////
	$tpp = 20;
	
	$url = "?action=order";
	
	if(!empty($page))
	{
		$start = ($page - 1) * $tpp;
	}
	else
	{
		$start = 0;
		$page = 1;
	}
	if ($showid && $keyword)
	{
		switch($showid)
		{
			case 1:
				$where = " AND model LIKE '%$keyword%'";
				break;
			case 2:
				$where = " AND name LIKE '%$keyword%'";
				break;
			case 3:
				$where = " AND tele LIKE '%$keyword%'";
				break;
			case 4:
				$where = " AND mobile LIKE '%$keyword%'";
				break;
			case 5:
				$where = " AND price LIKE '%$keyword%'";
				break;
			case 6:
				$where = " AND sheng LIKE '%$keyword%'";
				break;	
		}
		$url .= "&showid=$showid&keyword=$keyword";
	}
	$query = $db->query("SELECT COUNT(*) FROM {$tablepre}orderinfo WHERE 1 $where");
	
	$topicsnum = $db->result($query, 0);
	
	$_TPL_multipage = multi($topicsnum, $tpp, $page, $url);
	
	$sql = "SELECT id,model,price,name,tele,mobile,buynum,sheng,addtime FROM {$tablepre}orderinfo  WHERE 1 $where ORDER BY id DESC LIMIT $start,$tpp";
	
	$query = $db->query($sql);
	
	while ($s = $db->fetch_array($query))
	{

		$_TPL_list[] = $s;
	}
}
include template('admin_orders',0,'admin');

?>


