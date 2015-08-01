<? if(!defined('IN_LQM')) exit('Access Denied'); include template('admin_header','0','admin'); ?>
<BR />
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#003366">
    <tr class="header">
        <td width="26%" height="20" align="center">数据表名</td>
        <td width="20%">类型</td>
        <td width="18%">记录数</td>
        <td width="19%">数据</td>
        <td width="17%">索引</td>
    </tr>
        
    <? if(is_array($_TPL_list)) { foreach($_TPL_list as $v) { ?>    <tr>
        <td height="24" align="center" bgcolor="#FFFFFF"><?=$v['Name']?></td>
        <td bgcolor="#FFFFFF"><?=$v['Engine']?></td>
        <td bgcolor="#FFFFFF"><?=$v['Rows']?></td>
        <td bgcolor="#FFFFFF"><?=$v['Data_length']?></td>
        <td bgcolor="#FFFFFF"><?=$v['Index_length']?></td>
    </tr>
    <? } } ?></table>
<BR /><BR />
<? include template('admin_footer','0','admin'); ?>
