<?php
global $_GPC, $_W;
$action = 'start';
//$GLOBALS['frames'] = $this->getMainMenu2();
$storeid=$_COOKIE["storeid"];
$uid=$_COOKIE["uid"];
$cur_store = $this->getStoreById($storeid);
$GLOBALS['frames'] = $this->getNaveMenu($storeid, $action,$uid);
$list = pdo_get('cjdc_type',array('id'=>$_GPC['id']));
$list2 = pdo_get('cjdc_grouptype',array('id'=>$_GPC['id']));
			$data['order_by']=$_GPC['order_by'];
			$data['type_name']=$_GPC['type_name'];
			$data['is_open']=$_GPC['is_open'];
			$data['store_id']=$storeid;
			$data['uniacid']=$_W['uniacid'];
		if(checksubmit('submit')){
			if($_GPC['id']==''){
				$res=pdo_insert('cjdc_type',$data);
				$data2['name'] = $_GPC['type_name'];
				$data2['num'] = $_GPC['order_by'];
				$data2['uniacid'] = $_GPC['uniacid'];
				$res2=pdo_insert('cjdc_grouptype',$data2);
				if($res){
					message('添加成功',$this->createWebUrl2('dldishestype',array()),'success');
				}else{
					message('添加失败','','error');
				}
			}else{
				$res = pdo_update('cjdc_type', $data, array('id' => $_GPC['id']));
				if($list2) {
					$data2['name'] = $_GPC['type_name'];
					$data2['num'] = $_GPC['order_by'];
					$data2['uniacid'] = $_GPC['uniacid'];
					$res2 = pdo_update('cjdc_grouptype', $data, array('id' => $_GPC['id']));
				}

				if($res){
					message('编辑成功',$this->createWebUrl2('dldishestype',array()),'success');
				}else{
					message('编辑失败','','error');
				}
			}
		}
include $this->template('web/dladddishestype');