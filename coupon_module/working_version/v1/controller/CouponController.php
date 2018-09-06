<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  CouponController.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/03 09:28
 *  文件描述 :  优惠劵控制器
 *  历史记录 :  -----------------------
 */
namespace app\coupon_module\working_version\v1\controller;
use think\Controller;
use app\coupon_module\working_version\v1\service\CouponService;
use think\Request;

class CouponController extends Controller
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
    public function couponAdd(Request $request)
    {
        // 获取数据
        $offerName = $request->post('offername');
        $offerMount = $request->post('offermount');
        $String = $request->post('string');
        $End = $request->post('end');
        $statue = $request->post('statue');
        // 验证数据
        if (!$offerName) return returnResponse(1, '请送优惠名称');
        if (!$offerMount) return returnResponse(1, '请发送优惠价格');
        if (!$String) return returnResponse(1, '请发送优惠劵开始时间');
        if (!$End) return returnResponse(1, '请发送优惠劵结束时间');
        // 引入Service逻辑层数据
        $admin = (new CouponService())->couponAdd($offerName, $offerMount, $String, $End,$statue);
        // 判断是否审核成功
        if ($admin['msg'] == 'error') return returnResponse(2, $admin['data']);
        // 返回接口响应数据
        return returnResponse(0, '添加成功', $admin['data']);
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
    public function couponDel(Request $request)
    {
        // 获取数据
        $id = $request->post('id');
        $status = $request->post('status');
        // 验证数据
        if (!$id) return returnResponse(1, '请发送优惠ID');
        // 引入Service逻辑层数据
        $admin = (new CouponService())->couponDel($id,$status);
        // 判断是否审核成功
        if ($admin['msg'] == 'error') return returnResponse(2, $admin['data']);
        // 返回接口响应数据
        return returnResponse(0, '删除成功', $admin['data']);
    }

    /**
     * 名  称 : couponSel()
     * 功  能 : 查看优惠劵
     * 变  量 : -----------------------------
     * 输  入 : (string) $id => '优惠劵id';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function couponSel(Request $request)
    {
        // 获取数据
        $id = $request->post('id');
        // 引入Service逻辑层数据
        $admin = (new CouponService())->couponSel($id);
        // 判断是否审核成功
        if ($admin['msg'] == 'error') return returnResponse(2, $admin['data']);
        // 返回接口响应数据
        return returnResponse(0, '查询成功', $admin['data']);
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
    public function associationAdd(Request $request)
    {
        // 获取数据
        $openid = $request->post('openid');
        $id = $request->post('id');
        // 判断是否有数据
        if(!$openid) return returnResponse(1,'请输入用户id');
        if(!$id) return returnResponse(1,'请输入优惠劵id');
        // 引入Service逻辑层数据
        $admin = (new CouponService())->associationAdd($openid,$id);
        // 判断是否审核成功
        if ($admin['msg'] == 'error') return returnResponse(2, $admin['data']);
        // 返回接口响应数据
        return returnResponse(0, '添加成功', $admin['data']);
    }


    /**
     * 名  称 : associationSel()
     * 功  能 : 查看用户有多少优惠劵
     * 变  量 : -----------------------------
     * 输  入 : (string) $openid => '用户id';
     * 输  入 : (string) $status => '状态';
     * 输  出 : {"errNum":0,"retMsg":"请求成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function associationSel(Request $request)
    {
        // 获取职位数据
        $openid = $request->post('openid');
        $status = $request->post('status');
        if(!$openid) return returnResponse(1,'请输入用户id');
        // 引入Service逻辑层数据
        $admin = (new CouponService())->associationSel($openid,$status);
        // 判断是否审核成功
        if ($admin['msg'] == 'error') return returnResponse(2, $admin['data']);
        // 返回接口响应数据
        return returnResponse(0, '查询成功', $admin['data']);
    }


    /**
     * 名  称 : associationEdt()
     * 功  能 : 修改优惠劵状态
     * 变  量 : -----------------------------
     * 输  入 : (string) $After => '使用后的状态';
     * 输  入 : (string) $status => '修改的状态';
     * 输  出 : {"errNum":0,"retMsg":"修改成功","retData":true}
     * 创  建 : 2018/09/03 10:21
     */
    public function associationEdt(Request $request)
    {
        // 获取数据
        $After = $request->post('after');
        $status = $request->post('status');
        if(!$After) return returnResponse(1,'请输使用后的状态');
        if(!$status) return returnResponse(1,'请输修改的状态');
        // 引入Service逻辑层数据
        $admin = (new CouponService())->associationEdt($status);
        // 判断是否审核成功
        if ($admin['msg'] == 'error') return returnResponse(2, $admin['data']);
        // 返回接口响应数据
        return returnResponse(0, '修改成功', $admin['data']);
    }
}
