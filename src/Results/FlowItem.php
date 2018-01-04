<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 15:09
 */

namespace LenoveConnect\Results;


abstract class FlowItem{
    /**
     * 时间点
     *
     * @var string
     */
    public $datePoint;

    /**
     * 流量大小
     *
     * @var string
     */
    public $flowSize;
}