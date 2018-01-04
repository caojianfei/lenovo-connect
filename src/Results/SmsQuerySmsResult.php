<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:27
 */

namespace LenoveConnect\Results;


class SmsQuerySmsResult extends BaseResult
{
    /**
     * 短信数量
     *
     * @var integer
     */
    public $totalNum;

    /**
     * 短信列表
     *
     * @var SmsInfoItem[]
     */
    public $smsInfo;

    public function parseBusiness($result_info)
    {
        if (!empty($result_info->totalNum)) {
            $this->totalNum = (int)$result_info->totalNum;
        }

        if (!empty($result_info->smsInfo)) {
            $base64SmsInfo = $result_info->smsInfo;
            $this->smsInfo = base64_decode($base64SmsInfo);
        }
    }

}