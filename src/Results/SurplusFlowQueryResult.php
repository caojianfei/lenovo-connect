<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 13:34
 */

namespace LenoveConnect\Results;


class SurplusFlowQueryResult extends BaseResult
{
    public $surplusFlowValue;

    protected function parseBusiness($result_info)
    {
        if ($this->respCode === '0000') {
            $this->surplusFlowValue = $result_info->surplusFlowValue;
        }
    }

}