<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:21
 */

namespace LenoveConnect\Results;


class SmsSendSmsResult extends BaseResult
{
    public $sendSmsTag;

    public $smsId;

    protected function parseBusiness($result_info)
    {
        if ($this->respCode === '0000') {
            $this->sendSmsTag = $result_info->sendSmsTag;
            $this->smsId = $result_info->smsId;
        }
    }
}