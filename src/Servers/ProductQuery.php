<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:06
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\ProductQueryResult;

class ProductQuery extends BaseService
{

    const ServerName = 'Lao.base.product.query';

    protected $param = [
        'iccid' => ''
    ];

    /**
     * 参数检测
     *
     * @throws \Error
     */
    public function checkParam()
    {
        parent::checkSysParam();

//        if (empty($this->param['iccid'])) {
//            throw new \Error('iccid can not be empty');
//        }
    }

    protected function parseResult($result)
    {
        return call_user_func_array([new ProductQueryResult(), 'parse'], (array) $result);
    }
}