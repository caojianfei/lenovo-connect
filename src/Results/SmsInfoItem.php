<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:39
 */

namespace LenoveConnect\Results;


class SmsInfoItem
{
    /**
     * 电话号码
     *
     * @var string
     */
    public $msisdn;

    /**
     * 短信流水号
     *
     * @var string
     */
    public $smsId;

    /**
     * 短信内容
     *
     * @var string
     */
    public $smsContent;

    /**
     * 发送时间
     *
     * @var string
     */
    public $sendDate;
}