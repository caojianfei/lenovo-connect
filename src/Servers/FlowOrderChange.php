<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 15:33
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\FlowOrderChangeResult;


class FlowOrderChange extends BaseService
{
    const ServerName = 'Lao.base.flowOrder.change';

    protected $param = [
        'iccid' => '',
        'goodsId' => ''
    ];

    /**
     * 参数检测
     *
     * @throws \Error
     */
    public function checkParam()
    {
        parent::checkSysParam();
        foreach ($this->param as $k => $v) {
            if (empty($v)) {
                throw new \Error("$k can not be empty");
            }
        }
    }

    protected function parseResult($result)
    {
        return call_user_func_array([new FlowOrderChangeResult(), 'parse'], (array) $result);
    }

}