<?php
defined('IN_IA') or exit('Access Denied');
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('cjdc_system',array('uniacid'=>$_W['uniacid']));
    if(checksubmit('submit')){
            $data['sss_appkey']=$_GPC['sss_appkey'];
            $data['sss_secret']=$_GPC['sss_secret'];
            $data['uniacid']=$_W['uniacid'];
            if($_GPC['id']==''){                
                $res=pdo_insert('cjdc_system',$data);
                if($res){
                    message('添加成功',$this->createWebUrl('sss',array()),'success');
                }else{
                    message('添加失败','','error');
                }
            }else{
                $res = pdo_update('cjdc_system', $data, array('id' => $_GPC['id']));
                if($res){
                    message('编辑成功',$this->createWebUrl('sss',array()),'success');
                }else{
                    message('编辑失败','','error');
                }
            }
        }
    include $this->template('web/sss');