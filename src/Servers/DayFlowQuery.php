<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/3
 * Time: 20:03
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\DayFlowQueryResult;


class DayFlowQuery extends BaseService
{
    const ServerName = 'Lao.base.dayFlow.query';

    protected $param = [
        'iccid' => '',
        'dayDate' => ''
    ];

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
        return call_user_func_array([new DayFlowQueryResult(), 'parse'], (array) $result);
    }
}