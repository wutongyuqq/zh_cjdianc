<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$info=pdo_get('cjdc_shop',array('id'=>$_GPC['id']));
if(checksubmit('submit')){
    if($info['logo']!=$_GPC['logo']){
    $data['logo']=$_W['attachurl'].$_GPC['logo'];
  }
     if($_GPC['item']==1){
         $data['src']=$_GPC['src'];
     }elseif($_GPC['item']==2){
         $data['src2']=$_GPC['src2'];
     }elseif($_GPC['item']==3){
        $data['xcx_name']=$_GPC['xcx_name'];
        $data['appid']=trim($_GPC['appid']);
     }
        $data['orderby']=$_GPC['orderby'];
        $data['giftPersonNum']=$_GPC['giftPersonNum'];
        $data['status']=$_GPC['status'];
        $data['title']=$_GPC['title'];
        $data['item']=$_GPC['item'];
        
        $data['type']=$_GPC['type'];
        $data['giftLevel']=$_GPC['giftLevel'];
        $data['giftAddress']=$_GPC['giftAddress'];
        $data['giftTotalNum']=$_GPC['giftTotalNum'];
        $data['start_time']=$_GPC['time']['start'];
        $data['end_time']=$_GPC['time']['end'];
        $data['uniacid']=$_W['uniacid'];
        $data['created_time']=date('Y-m-d H:i:s');
     if($_GPC['id']==''){  
        $res=pdo_insert('cjdc_shop',$data);
        if($res){
             message('添加成功！', $this->createWebUrl('shop'), 'success');
        }else{
             message('添加失败！','','error');
        }
    }else{
        $res=pdo_update('cjdc_shop',$data,array('id'=>$_GPC['id']));
        if($res){
             message('编辑成功！', $this->createWebUrl('shop'), 'success');
        }else{
             message('编辑失败！','','error');
        }
    }
}
include $this->template('web/addshop');