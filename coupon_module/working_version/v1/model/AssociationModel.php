<?php
/**
 *  版权声明 :  地老天荒科技有限公司
 *  文件名称 :  CouponModel.php
 *  创 建 者 :  Shi Rui
 *  创建日期 :  2018/09/03 09:28
 *  文件描述 :  优惠劵模型层
 *  历史记录 :  -----------------------
 */
namespace app\coupon_module\working_version\v1\model;
use think\Model;

class AssociationModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'guanlian';

    // 设置当前模型对应数据表的主键
    protected $pk = 'openid';

    // 加载配置数据表名
    protected function initialize()
    {
        $this->table = config('v1_tableName.AssociTable');
    }
}
