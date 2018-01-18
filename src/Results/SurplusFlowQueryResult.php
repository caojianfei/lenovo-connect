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

    public $userFlowValue;

    protected function parseBusiness($result_info)
    {

        if (property_exists($result_info, 'surplusFlowValue')) {
            $this->surplusFlowValue = $result_info->surplusFlowValue;
        }

        if (property_exists($result_info, 'userFlowValue')) {
            $this->userFlowValue = $result_info->userFlowValue;
        }
    }

}