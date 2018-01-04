<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/3
 * Time: 16:28
 */

namespace LenoveConnect\Servers;

use LenoveConnect\Results\SurplusFlowQueryResult;


class SurplusFlowQuery extends BaseService
{
    const ServerName = 'Lao.base.surplusFlow.query';

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

    /**
     * 结果解析
     *
     * @param $result
     * @return mixed
     */
    protected function parseResult($result)
    {
        return call_user_func_array([new SurplusFlowQueryResult(), 'parse'], [$result]);
    }
}