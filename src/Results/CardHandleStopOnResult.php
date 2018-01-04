<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:04
 */

namespace LenoveConnect\Results;


class CardHandleStopOnResult extends BaseResult
{
    /**
     * 操作结果
     * 1 - 成功
     * 2 - 失败
     *
     * @var integer
     */
    public $isSuccess;

    protected function parseBusiness($result_info)
    {
        if ($this->respCode === '0000') {
            $this->isSuccess = (int)$result_info->isSuccess;
        }
    }


}