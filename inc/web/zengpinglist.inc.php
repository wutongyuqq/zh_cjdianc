<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
//$list=pdo_getall('cjdc_shop',array('uniacid'=>$_W['uniacid']),array(),'','orderby ASC');

$sql = "select c.*,d.name,d.img,d.user_tel from (select a.*,b.logo,b.start_time,b.end_time from ims_cjdc_user_level_gift a left join ims_cjdc_shop b on a.giftId = b.id) c left join ims_cjdc_user d on c.userId=d.id and c.isUsed==1  GROUP BY create_time desc";
$list = pdo_fetchall($sql);


$sql2 = "select c.*,d.name,d.img,d.user_tel from (select a.*,b.logo,b.start_time,b.end_time from ims_cjdc_user_level_gift a left join ims_cjdc_shop b on a.giftId = b.id) c left join ims_cjdc_user d on c.userId=d.id and c.isUsed==2 GROUP BY update_time desc";

$list2 = pdo_fetchall($sql2);

include $this->template('web/zengpinglist');