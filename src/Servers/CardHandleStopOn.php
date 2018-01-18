<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:01
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\CardHandleStopOnResult;


class CardHandleStopOn extends BaseService
{
    const ServerName = 'Lao.base.cardHandle.stopOn';

    protected $param = [
        'iccid' => '',
        'stateCode' => ''
    ];

    /**
     * 参数检测
     *
     * @throws \Error
     */
    public function checkParam()
    {
        parent::checkSysParam();

        if (empty($this->param['iccid'])) {
            throw new \Error('iccid can not be empty');
        }

        if ($this->param['stateCode'] === '' || !in_array((string)$this->param['stateCode'], ["0", "1"])) {
            throw new \Error('stateCode can not be empty and can be only 0 or 1');
        }

    }

    protected function parseResult($result)
    {
        return call_user_func_array([new CardHandleStopOnResult(), 'parse'], (array) $result);
    }

}