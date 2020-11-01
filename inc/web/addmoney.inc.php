<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu2();
$uniacid=$_W['uniacid'];
if($_GPC['time']){
	$start=$_GPC['time']['start'];
	$end=$_GPC['time']['end'];
	$where.=" and time >='{$start}' and time<='{$end}'";
}
$pageindex = max(1, intval($_GPC['page']));
$pagesize=10;
$sql="select a.*,b.name,b.img,b.user_tel  from " . tablename("cjdc_qbmx") ." a left join ".tablename("cjdc_user")." b on a.user_id=b.id ".$where." order by id DESC";
$select_sql =$sql." LIMIT " .($pageindex - 1) * $pagesize.",".$pagesize;
$list = pdo_fetchall($select_sql);
$time = $_GPC['time'];
$total=pdo_fetchcolumn("select count(*) from " . tablename("cjdc_qbmx") ." ".$where);
$pager = pagination($total, $pageindex, $pagesize);
include $this->template('web/addmoney');