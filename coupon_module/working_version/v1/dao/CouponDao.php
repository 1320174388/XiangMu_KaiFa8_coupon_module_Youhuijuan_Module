<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  CouponDao.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/03 09:28
 *  文件描述 :  优惠劵数据层
 *  历史记录 :  -----------------------
 */
namespace app\coupon_module\working_version\v1\dao;
use app\coupon_module\working_version\v1\model\AssociationModel;
use app\coupon_module\working_version\v1\model\CouponModel;

class CouponDao
{
    /**
     * 名  称 : couponAdd()
     * 功  能 : 添加优惠劵
     * 变  量 : -----------------------------
     * 输  入 : (string) $offerName => '优惠劵名称';
     * 输  入 : (string) $offerMount => '优惠劵价格';
     * 输  入 : (string) $String => '开始时间';
     * 输  入 : (string) $End => '结束时间';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function couponAdd($offerName,$offerMount,$String,$End,$statue)
    {
        // 实例化数据库模型
        $applyModel = new CouponModel;
        // 处理数据
        $a = 1;
        $applyModel->offername  = $offerName;
        $applyModel->offermount   = $offerMount;
        $applyModel->string = $String;
        $applyModel->end = $End;
        $applyModel->statue = $statue;
        // 写入数据库
        $res = $applyModel->save();
        // 判断是否写入成功
        if(!$res){
            return returnData('error');
        }
        // 返回数据
        return returnData('success',true);
    }
    /**
     * 名  称 : couponDel()
     * 功  能 : 修改优惠劵状态
     * 变  量 : -----------------------------
     * 输  入 : (string) $id => '优惠劵id';
     * 输  入 : (string) $status => '状态';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function couponDel($id,$status)
    {
        // 实例化模型
        $rightModel = CouponModel::where('id', $id)->find();
        // 处理数据
        $rightModel->statue  = $status;
        // 保存数据
        $res = $rightModel->save();
        if(!$res) return returnData('error');
        // 返回数据
        return returnData('success',true);

    }
    /**
     * 名  称 : couponSel()
     * 功  能 : 查看优惠劵
     * 变  量 : -----------------------------
     * 输  入 : (string) $id => '优惠劵id';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function couponSel($id='')
    {
        // 实例化自动回复信息model
        $applyModel = new CouponModel;
        // 如果$index为空字符串,就查询所有
        if($id == ''){
            $list = $applyModel->select();
        }else{
            $list = $applyModel->where('id',$id)->find();
        }
        // 验证
        if(!$list){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$list);
    }



    /**
     * 名  称 : associationAdd()
     * 功  能 : 用户添加优惠劵
     * 变  量 : -----------------------------
     * 输  入 : (string) $openid => '用户id';
     * 输  入 : (string) $id => '优惠劵id';
     * 输  出 : {"errNum":0,"retMsg":"添加成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function associationAdd($openid,$id)
    {
        // 实例化数据库模型
        $applyModel = new AssociationModel;
        // 处理数据
        $applyModel->openid  = $openid;
        $applyModel->id   = $id;
        $applyModel->statue = 1;
        // 写入数据库
        $res = $applyModel->save();
        // 判断是否写入成功
        if(!$res){
            return returnData('error');
        }
        // 返回数据
        return returnData('success',true);
    }

    /**
     * 名  称 : associationSel()
     * 功  能 : 查看用户有多少优惠劵
     * 变  量 : -----------------------------
     * 输  入 : (string) $id => '用户id';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function associationSel($openid,$status)
    {
        // 实例化自动回复信息model
        $applyModel = new AssociationModel;

        $list = $applyModel->where('openid',$openid and 'status',$status)->select();

        // 验证
        if(!$list){
            return returnData('error',false);
        }
        // 返回数据
        return returnData('success',$list);
    }


    /**
     * 名  称 : associationEdt()
     * 功  能 : 修改状态
     * 变  量 : -----------------------------
     * 输  入 : (string) $status => '状态';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function associationEdt($status)
    {
        // 实例化model
        $applyModel = new AssociationModel;
        // 处理数据
        $applyModel->status = $status;
        // 保存数据
        $res = $applyModel->save();
        if(!$res) return returnData('error');
        // 返回数据
        return returnData('success',$res);
    }

}
