<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  coupon_module_v1_api
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/08/03 10:30
 *  文件描述 :  优惠劵路由文件
 *  历史记录 :  -----------------------
 */


// +------------------------------------------------------
// : 优惠劵接口，传值方式：POST， 功能：添加优惠劵
// : 优惠劵接口，传值方式：POST， 功能：删除优惠劵
// : 优惠劵接口，传值方式：POST， 功能：查看优惠劵
// : 优惠劵接口，传值方式：POST， 功能：用户添加优惠劵
// : 优惠劵接口，传值方式：POST， 功能：查看用户有多少优惠劵
// : 优惠劵接口，传值方式：POST， 功能：修改优惠劵状态
// +------------------------------------------------------


Route::post(
    'v1/coupon_module/paymentOrder',
    'coupon_module/v1.controller.CouponController/couponAdd'
);

Route::post(
    'v1/coupon_module/paymentDel',
    'coupon_module/v1.controller.CouponController/couponDel'
);

Route::post(
    'v1/coupon_module/paymentSel',
    'coupon_module/v1.controller.CouponController/couponSel'
);

Route::post(
    'v1/coupon_module/associationAdd',
    'coupon_module/v1.controller.CouponController/associationAdd'
);

Route::post(
    'v1/coupon_module/associationSel',
    'coupon_module/v1.controller.CouponController/associationSel'
);

Route::post(
    'v1/coupon_module/associationEdt',
    'coupon_module/v1.controller.CouponController/associationEdt'
);