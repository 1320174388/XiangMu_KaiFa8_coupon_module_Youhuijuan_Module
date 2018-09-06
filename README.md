Coupon_Module : 优惠劵模块
===============

> 模块基于ThinkPHP5.1目录开发，以项目开发基础目录为标准

## 目录结构

~~~
├─reduction_module         模块目录
│  ├─config                配置目录
│  │  ├─v1_tableName.php   数据表配置文件
│  │  ├─v1_config.php      管理模块路由
│  │  └─ ...               更多配置
│  ├─working_version       工作版本目录
│  │  ├─v1                 版本1目录
│  │  └─ ...               更多版本目录      
│  └─common.php            模块函数文件
├─README.md                模块说明文件
~~~

## v1版本接口说明：添加优惠劵   .删除优惠劵 . 查看优惠劵

## 添加优惠劵

~~~[api]
post:/v1/coupon_module/paymentOrder
*offername#优惠劵名称
*offermount#优惠劵价格
*string#开始时间
*end#结束时间
<<<
success
{"errNum":0,"retMsg":"申请成功","retData":true}
<<<
error
{"errNum":1,"retMsg":"优惠劵名称为空","retData":false}
<<<
error
{"errNum":2,"retMsg":"价格为空","retData":false}
<<<
error
{"errNum":3,"retMsg":"开始时间为空","retData":false}
<<<
error
{"errNum":4,"retMsg":"结束时间为空","retData":false}
~~~


## 查看优惠劵
~~~[api]
post:/v1/coupon_module/paymentSel
<<<
success
{"errNum":0,"retMsg":"请求成功","retData":true}
~~~

## 修改优惠劵状态
~~~[api]
post:/v1/coupon_module/paymentDel
<<<
success
{"errNum":0,"retMsg":"修改成功","retData":true}
~~~

## 用户添加优惠劵
~~~[api]
post:/v1/coupon_module/associationAdd
*openid#用户ID
*ID#优惠劵id
<<<
success
{"errNum":0,"retMsg":"添加成功","retData":true}
~~~

## 查看用户有多少优惠劵
~~~[api]
post:/v1/coupon_module/associationSel
*openid#用户ID
*status#状态 1/2
*openid#用户ID
<<<
success
{"errNum":0,"retMsg":"请求成功","retData":true}
~~~

## 修改优惠劵状态
~~~[api]
post:/v1/coupon_module/associationEdt
*After#使用后的状态
*status#修改的状态
<<<
success
{"errNum":0,"retMsg":"修改成功","retData":true}
~~~