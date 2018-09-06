<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  CouponService.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/03 09:28
 *  文件描述 :  优惠劵逻辑层
 *  历史记录 :  -----------------------
 */
namespace app\coupon_module\working_version\v1\service;
use app\coupon_module\working_version\v1\dao\CouponDao;

class CouponService
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
        // 引入RoleDao数据层
        $res = (new CouponDao())->couponAdd($offerName,$offerMount,$String,$End,$statue);
        if($res['msg']=='error') return returnData('error','添加失败');
        // 返回数据
        return returnData('success',true);
    }
    /**
     * 名  称 : couponDel()
     * 功  能 : 修改优惠劵状态
     * 变  量 : -----------------------------
     * 输  入 : (string) $id => '优惠劵id';
     * 输  入 : (string) $status => '状态';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function couponDel($id,$status)
    {
        // 引入RoleDao数据层
        $res = (new CouponDao())->couponDel($id,$status);
        if($res['msg']=='error') return returnData('error','修改失败');
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
        // 引入RoleDao数据层
        $res = (new CouponDao())->couponSel($id);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

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
        // 引入RoleDao数据层
        $res = (new CouponDao())->associationAdd($openid,$id);
        if($res['msg']=='error') return returnData('error','添加失败');
        // 返回数据
        return returnData('success',true);

    }

    /**
     * 名  称 : associationSel()
     * 功  能 : 查看用户优惠劵
     * 变  量 : -----------------------------
     * 输  入 : (string) $id => '用户id';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function associationSel($openid,$status)
    {
        // 引入RoleDao数据层
        $res = (new CouponDao())->associationSel($openid,$status);
        if($res['msg']=='error') return returnData('error','查询失败');
        // 返回数据
        return returnData('success',true);

    }

    /**
     * 名  称 : associationEdt()
     * 功  能 : 用户优惠劵状态修改
     * 输  入 : (string) $After => '使用后的状态';
     * 输  入 : (string) $status => '修改的状态';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function associationEdt($status)
    {
        // 引入RoleDao数据层
        $res = (new CouponDao())->associationEdt($status);
        if($res['msg']=='error') return returnData('error','修改失败');
        // 返回数据
        return returnData('success',true);

    }
}
