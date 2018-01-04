<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 15:14
 */

namespace LenoveConnect\Results;


class CardStateQueryResult extends BaseResult
{
    /**
     * 卡状态
     * 1 - 在用
     * 2 - 停机
     * 3 - 待激活
     * 4 - 销户
     *
     * @var integer
     */
    public $cardStatus;

    public function parseBusiness($result_info)
    {
        if ($this->respCode === '0000') {
            $this->cardStatus = (int)$result_info->cardStatus;
        }
    }

}