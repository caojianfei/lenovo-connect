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

/**
 * @method static SurplusFlowQueryResult SurplusFlowQuery($param = [], $sysParam = [], $mock = false)
 * @method static DayFlowQueryResult DayFlowQuery($param = [], $sysParam = [], $mock = false);
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