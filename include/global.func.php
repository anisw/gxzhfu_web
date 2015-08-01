<?php

if(!defined('IN_LQM')) {
	exit('Access Denied');
}

//前后台公共函数区
function cutstr($string, $length, $dot = ' ...') {
	global $charset;

	if(strlen($string) <= $length) {
		return $string;
	}

	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);

	$strcut = '';
	if(strtolower($charset) == 'utf-8') {

		$n = $tn = $noc = 0;
		while($n < strlen($string)) {

			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}

			if($noc >= $length) {
				break;
			}

		}
		if($noc > $length) {
			$n -= $tn;
		}

		$strcut = substr($string, 0, $n);

	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}

	$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);

	return $strcut.$dot;
}
function getLenStr($string,$length){
	if (strlen($string)>$length){
		$string = cutstr($string,$length,'');
	}
	return $string;
}
function datecheck($ymd, $sep='-') {
	if(!empty($ymd)) {
		list($year, $month, $day) = explode($sep, $ymd);
		return checkdate($month, $day, $year);
	} else {
		return FALSE;
	}
}
function dhtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}
function multi($num, $perpage, $curpage, $mpurl, $maxpages = 0, $page = 10, $autogoto = TRUE, $simple = FALSE) {
	global $maxpage;
	$ajaxtarget = !empty($_GET['ajaxtarget']) ? " ajaxtarget=\"".dhtmlspecialchars($_GET['ajaxtarget'])."\" " : '';

	$multipage = '';
	if(stristr($mpurl,'?')){
		$mpurl .=  '&';
	}else{
		$mpurl .= strpos($mpurl, '?') ? '&amp;' : '?';
	}
	$realpages = 1;
	if($num > $perpage) {
		$offset = 2;

		$realpages = @ceil($num / $perpage);
		$pages = $maxpages && $maxpages < $realpages ? $maxpages : $realpages;

		if($page > $pages) {
			$from = 1;
			$to = $pages;
		} else {
			$from = $curpage - $offset;
			$to = $from + $page - 1;
			if($from < 1) {
				$to = $curpage + 1 - $from;
				$from = 1;
				if($to - $from < $page) {
					$to = $page;
				}
			} elseif($to > $pages) {
				$from = $pages - $page + 1;
				$to = $pages;
			}
		}

		$multipage = ($curpage - $offset > 1 && $pages > $page ? '<a href="'.$mpurl.'page=1" class="first"'.$ajaxtarget.'>1 ...</a>' : '').
			($curpage > 1 && !$simple ? '<a href="'.$mpurl.'page='.($curpage - 1).'" class="prev"'.$ajaxtarget.'>&lsaquo;&lsaquo;</a>' : '');
		for($i = $from; $i <= $to; $i++) {
			$multipage .= $i == $curpage ? '<strong>'.$i.'</strong>' :
				'<a href="'.$mpurl.'page='.$i.($ajaxtarget && $i == $pages && $autogoto ? '#' : '').'"'.$ajaxtarget.'>'.$i.'</a>';
		}

		$multipage .= ($curpage < $pages && !$simple ? '<a href="'.$mpurl.'page='.($curpage + 1).'" class="next"'.$ajaxtarget.'>&rsaquo;&rsaquo;</a>' : '').
			($to < $pages ? '<a href="'.$mpurl.'page='.$pages.'" class="last"'.$ajaxtarget.'>... '.$realpages.'</a>' : '').
			(!$simple && $pages > $page && !$ajaxtarget ? '<kbd><input type="text" name="custompage" size="3" onkeydown="if(event.keyCode==13) {window.location=\''.$mpurl.'page=\'+this.value; return false;}" /></kbd>' : '');

		$multipage = $multipage ? '<div class="pages">'.(!$simple ? '<em>共有&nbsp;'.$num.'&nbsp;</em>' : '').$multipage.'</div>' : '';
	}
	$maxpage = $realpages;
	return $multipage;
}
function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}
function removeDir($dirName) {
	  $result = false;
	  if (!file_exists($dirName)){
		 $result = false;
		 return $result;
	  }else{
		  if(!is_dir($dirName)){
				trigger_error("目录名称错误", E_USER_ERROR);
		  }
		  $handle = opendir($dirName);
		  while(($file = readdir($handle)) !== false) {
				 if($file != '.' && $file != '..') {
					 $dir = $dirName . DIRECTORY_SEPARATOR . $file;
					 is_dir($dir) ? removeDir($dir) : unlink($dir);
				 }
		  }
		 closedir($handle);
		 $result = rmdir($dirName) ? true : false;
		 return $result;
	}
}
function template($file, $templateid = 0, $tpldir = '') {
	$tpldir = $tpldir ? $tpldir : 'default';
	$templateid = $templateid ? $templateid : 0;
	$tplfile = LQM_ROOT.'./'.$tpldir.'/'.$file.'.htm';
	$objfile = LQM_ROOT.'./cachedata/templates/'.$tpldir.'/'.$file.'.tpl.php';
	if($templateid != 1 && !file_exists($tplfile)) {
		$tplfile = LQM_ROOT.'./templates/'.$tpldir.'/'.$file.'.htm';
	}
	@checktplrefresh($tplfile, $tplfile, filemtime($objfile), $templateid, $tpldir);
	return $objfile;
}
function checktplrefresh($maintpl, $subtpl, $timecompare, $templateid, $tpldir) {
	global $tplrefresh;
	if(empty($timecompare) || $tplrefresh == 1 || ($tplrefresh > 1 && !($GLOBALS['timestamp'] % $tplrefresh))) {
		if(empty($timecompare) || @filemtime($subtpl) > $timecompare) {
			require_once LQM_ROOT.'./include/template.func.php';
			parse_template($maintpl, $templateid, $tpldir);
			return TRUE;
		}
	}
	return 	FALSE;
}
function LoadCachefile($cachename){
	$file = LQM_ROOT.'./cachedata/cache/'.$cachename.'.php';
	if(!file_exists($file)){
		require_once (LQM_ROOT.'include/cache.inc.php');
		updateCache($cachename);
	}
	return $file;
}
function sizecount($filesize) {
	if($filesize >= 1073741824) {
		$filesize = round($filesize / 1073741824 * 100) / 100 . ' G';
	} elseif($filesize >= 1048576) {
		$filesize = round($filesize / 1048576 * 100) / 100 . ' M';
	} elseif($filesize >= 1024) {
		$filesize = round($filesize / 1024 * 100) / 100 . ' K';
	} else {
		$filesize = $filesize . ' bytes';
	}
	return $filesize;
}


function getOrderStatusColor($id){
	/*$_DCACHE['order_status'] = Array('0' => '未审核',
	 '1' => '已订购',
	 '2' => '发客户',
	 '3' => '已完成',
	);*/
	global $_DCACHE,$session_userinfo;
	switch ($id){
		case 0:
			$color = '#FA9D0A';
			break;
		case 1:
			$color = '#00FF00';
			break;
		case 2:
			$color = '#0000FF';
			break;
		case 3:
			$color = '#339966';
			break;
		default:
			$color = '#000';
	}
	
	foreach((array)$_DCACHE[order_status] as $k=>$v){
		if ($id == $k){
			$statusName = "<font color=\"$color\">".str_replace(' ','',$v)."</font>";
			break;
		}
	}
	if (!$statusName){
		$statusName = '未知状态';
	}
	return $statusName;
	
}


//管理员函数区
function adminmessage($show_message, $url_forward = '',$java=false){
	extract($GLOBALS, EXTR_SKIP);
	closeDB();
	if (!$java){
		$_TPL_message = $show_message;
		$_TPL_url_redirect = $url_forward ? '<meta http-equiv="refresh" content="2;url='.$url_forward.'">' : NULL;
		include template('admin_message',0,'admin');
	}else{
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">alert('$show_message');";
		if ($url_forward)
			echo "location.href='$url_forward';";
		elseif (strpos($show_message, '返回'))
			echo "history.go(-1);";
		elseif (strpos($show_message, '关闭'))
			echo "window.close();";
		echo "</script>";
		die(0);
	}
}


?>