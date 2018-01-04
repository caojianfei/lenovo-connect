<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/3
 * Time: 19:36
 */

namespace LenoveConnect;

use LenoveConnect\Results\SurplusFlowQueryResult;
use LenoveConnect\Results\DayFlowQueryResult;
use LenoveConnect\Results\MonthFlowQueryResult;
use LenoveConnect\Results\CardStateQueryResult;
use LenoveConnect\Results\CardActivateChangeResult;
use LenoveConnect\Results\FlowOrderChangeResult;
use LenoveConnect\Results\CardHandleStopOnResult;
use LenoveConnect\Results\ProductQueryResult;
use LenoveConnect\Results\SmsSendSmsResult;
use LenoveConnect\Results\SmsQuerySmsResult;

/**
 * @method static SurplusFlowQueryResult SurplusFlowQuery($param = [], $sysParam = [], $mock = false) 剩余流量查询
 * @method static DayFlowQueryResult DayFlowQuery($param = [], $sysParam = [], $mock = false) 日流量查询
 * @method static MonthFlowQueryResult MonthFlowQuery($param = [], $sysParam = [], $mock = false) 月流量查询
 * @method static CardStateQueryResult CardStateQuery($param = [], $sysParam = [], $mock = false) 卡状态查询
 * @method static CardActivateChangeResult CardActivateChange($param = [], $sysParam = [], $mock = false) 卡激活
 * @method static FlowOrderChangeResult FlowOrderChange($param = [], $sysParam = [], $mock = false) 流量订购
 * @method static CardHandleStopOnResult CardHandleStopOn($param = [], $sysParam = [], $mock = false) 停开机
 * @method static ProductQueryResult ProductQuery($param = [], $sysParam = [], $mock = false) 产品列表查询
 * @method static SmsSendSmsResult SmsSendSms($param = [], $sysParam = [], $mock = false) 短信发送
 * @method static SmsQuerySmsResult SmsQuerySms($param = [], $sysParam = [], $mock = false) 信查询
 *
 * Class Client
 * @package LenoveConnect
 */
class Client
{
    public static function __callStatic($name, $arguments)
    {
        $class = "LenoveConnect\\Servers\\$name";

        if (!class_exists($class)) {
            throw new \Error('call undefined method');
        }

        return call_user_func_array([new $class, "exec"], $arguments);
    }

}