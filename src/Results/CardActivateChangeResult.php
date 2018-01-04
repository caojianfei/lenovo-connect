<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 15:29
 */

namespace LenoveConnect\Results;


class CardActivateChangeResult extends BaseResult
{
    public $result;

    public $goodsId;

    public $tradeId;

    protected function parseBusiness($result_info)
    {
        if ($this->respCode === '0000') {
            $this->result = $result_info->result;
            $this->goodsId = $result_info->goodsId;
            $this->tradeId = $result_info->tradeId;
        }
    }

}