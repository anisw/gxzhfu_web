<? if(!defined('IN_LQM')) exit('Access Denied'); include template('admin_header','0','admin'); ?>
<BR />
<? if($operation == 'vieworder') { ?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#003366">
    <tr class="header">
    	<td height="20" colspan="2">查看订单</td>
    </tr>
    <tr class="th1">
        <td width="13%" height="24" align="center" bgcolor="#FFFFFF">商品类型：</td>
        <td width="87%" align="left" bgcolor="#FFFFFF"><?=$info['model']?></td>
    </tr>
    <tr class="th1">
        <td height="24" align="center" bgcolor="#FFFFFF">订购数量：</td>
        <td align="left" bgcolor="#FFFFFF"><?=$info['buynum']?></td>
    </tr>
    <tr class="th1">
        <td height="24" align="center" bgcolor="#FFFFFF">价　　格：</td>
        <td align="left" bgcolor="#FFFFFF">￥<?=$info['price']?></td>
    </tr>
    <tr class="th1">
        <td height="24" align="center" bgcolor="#FFFFFF">姓　　名：</td>
        <td align="left" bgcolor="#FFFFFF"><?=$info['name']?></td>
    </tr>
  
  <tr class="th1">
        <td height="24" align="center" bgcolor="#FFFFFF">手　　机：</td>
        <td bgcolor="#FFFFFF"><?=$info['mobile']?></td>
    </tr>
    <tr class="th1">
        <td height="24" align="center" bgcolor="#FFFFFF">所在寝室：</td>
        <td bgcolor="#FFFFFF"><?=$info['sheng']?> <?=$info['shi']?> <?=$info['xian']?></td>
    </tr>
  
   
  <tr class="th1">
        <td height="24" align="center" bgcolor="#FFFFFF">备　　注：</td>
    	<td bgcolor="#FFFFFF"><?=$info['note']?></td>
    </tr>
    <tr class="th1">
        <td height="24" align="center" bgcolor="#FFFFFF">下单时间：</td>
        <td bgcolor="#FFFFFF"><?=$info['addtime']?></td>
    </tr>
</table>

<p align="center"><a href="###" onclick="history.go(-1);">返回</a></p>

<? } else { ?>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#003366">
    <form name="form" action="?action=order" method="post">
    <tr bgcolor="#CCCCCC">
        <td height="23" colspan="8">
        <div style="float:left"><?=$_TPL_multipage?></div>
        <div style="float:right">
            <input name="keyword" type="text"  value="<?=$keyword?>" title="请输入关键词"/> 
            <select name="showid">
            <option value="1" ><? if($showid==1 || !$showid) { ?> selected<? } ?>>商品型号</option>
            <option value="2" ><? if($showid==2) { ?> selected<? } ?>>姓名</option>
            <option value="3" ><? if($showid==3) { ?> selected<? } ?>>电话</option>
            <option value="4" ><? if($showid==4) { ?> selected<? } ?>>手机</option>
            <option value="5" ><? if($showid==5) { ?> selected<? } ?>>金额</option>
            <option value="6" ><? if($showid==6) { ?> selected<? } ?>>楼号</option>
            </select>
            <input name="submitsearch" type="submit" id="submitsearch" class="button"  value="搜索" />
        </div>
        </td>
    </tr>
        
    <tr class="header">
        <td width="7%" height="20" align="center"><input type="checkbox" name="chkall" onclick="checkall(this.form)">选择</td>
        <td width="11%">姓名</td>
        <td width="19%">手机</td>
        <td width="10%">楼号</td>
        <td width="18%">商品类型</td>
        <td width="12%">订购数量</td>
        <td width="19%">下单时间</td>
        <td width="14%">操作</td>
    </tr>
    <? if(is_array($_TPL_list)) { foreach($_TPL_list as $v) { ?>   
    <tr>
        <td height="24" align="center" bgcolor="#FFFFFF"><input type="checkbox" name="delids[]" value="<?=$v['id']?>" /></td>
        <td bgcolor="#FFFFFF"><a href="?action=order&operation=vieworder&id=<?=$v['id']?>"><?=$v['name']?></a></td>
        <td bgcolor="#FFFFFF"><?=$v['tele']?> <?=$v['mobile']?></td>
        <td bgcolor="#FFFFFF"><?=$v['sheng']?></td>
        <td bgcolor="#FFFFFF"><?=$v['model']?></td>
        <td bgcolor="#FFFFFF"><?=$v['buynum']?></td>
        <td bgcolor="#FFFFFF"><? echo date('Y-m-d H:i:s',$v['addtime']); ?>        </td>
        <td bgcolor="#FFFFFF">
        <a href="?action=order&operation=del&id=<?=$v['id']?>" onclick="if(confirm('真的要删除吗?')){return true;}else{return false;}">删除...</a></td>
    </tr>
    <? } } ?>     <tr>
      <td height="29" colspan="8" align="center" bgcolor="#CCCCCC">
      	<input type="submit" name="editsubmit" value="删除" style="cursor:pointer" class="button" />
      </td>
    </tr>
   	</form>
</table>
<? } ?>
<BR /><BR />
<? include template('admin_footer','0','admin'); ?>
