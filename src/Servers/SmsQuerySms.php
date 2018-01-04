<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:25
 */

namespace LenoveConnect\Servers;


class SmsQuerySms extends BaseService
{
    public $param = [
        'custId' => '',
        'startDate' => '',
        'endDate' => ''
    ];

    protected function checkParam()
    {
        foreach ($this->param as $k => $v) {
            if (empty($v)) {
                throw new \Error("$k can not be empty");
            }
        }
    }

    protected function parseResult($result)
    {

    }
}