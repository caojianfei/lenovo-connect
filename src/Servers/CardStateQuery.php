<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 15:12
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\CardStateQueryResult;


class CardStateQuery extends BaseService
{
    const ServerName = 'Lao.base.cardState.query';

    protected $param = [
        'iccid' => ''
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
    }

    protected function parseResult($result)
    {
        return call_user_func_array([new CardStateQueryResult(), 'parse'], (array) $result);
    }
}

