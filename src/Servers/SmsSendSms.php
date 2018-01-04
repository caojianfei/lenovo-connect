<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:19
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\SmsSendSmsResult;


class SmsSendSms extends BaseService
{
    protected $param = [
        'iccid' => '',
        'smsContent' => '',
        'lang' => 'EngLish'
    ];

    protected function checkParam()
    {
        parent::checkSysParam();

        if (empty($this->param['iccid'])) {
            throw new \Error('iccid can not be empty');
        }

        if (empty($this->param['smsContent'])) {
            throw new \Error('smsContent can not be empty');
        }
    }

    protected function parseResult($result)
    {
        return call_user_func_array([new SmsSendSmsResult(), 'parse'], [$result]);
    }

}