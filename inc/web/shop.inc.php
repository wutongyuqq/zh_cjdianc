<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//$list=pdo_getall('cjdc_shop',array('uniacid'=>$_W['uniacid']),array(),'','orderby ASC');

$sql = "select a.*,c.publisNum from ims_cjdc_shop a left join (select count(id) as publisNum,b.giftId from ims_cjdc_user_level_gift b GROUP by giftId) c on a.id = c.giftId";
$list = pdo_fetchall($sql);


if($_GPC['op']=='delete'){
	$res=pdo_delete('cjdc_shop',array('id'=>$_GPC['id']));
	if($res){
		 message('删除成功！', $this->createWebUrl('ad'), 'success');
		}else{
			  message('删除失败！','','error');
		}
}
if($_GPC['status']){
	$data['status']=$_GPC['status'];
	$res=pdo_update('cjdc_shop',$data,array('id'=>$_GPC['id']));
	if($res){
		 message('编辑成功！', $this->createWebUrl('ad'), 'success');
		}else{
			  message('编辑失败！','','error');
		}
}
include $this->template('web/shop');