<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 15:04
 */

namespace LenoveConnect\Results;


class MonthFlowQueryResult extends BaseResult
{
    /**
     * @var FlowItem[]
     */
    public $flowInfo = [];

    protected function parseBusiness($result_info)
    {
        if ($this->respCode === '0000') {
            $this->flowInfo = $result_info->flowInfo;
        }
    }
}