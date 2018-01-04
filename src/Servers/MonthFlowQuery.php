<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 15:00
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\MonthFlowQueryResult;


class MonthFlowQuery extends BaseService
{
    const ServerName = 'Lao.base.monthFlow.query';

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
        return call_user_func_array([new MonthFlowQueryResult(), 'parse'], (array) $result);
    }

}