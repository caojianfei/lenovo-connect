<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 13:58
 */

namespace LenoveConnect\Results;


abstract class BaseResult
{
    /**
     * 源结果
     *
     * @var string
     */
    public $originResult;

    /**
     * 结果对象
     *
     * @var object
     */
    public $resultInfo;
    /**
     * 结果码
     *
     * @var string
     */
    public $respCode;

    /**
     * 结果描述
     *
     * @var string
     */
    public $respDesc;

    /**
     * @param $result
     * @return $this
     */
    public function parse($result)
    {
        $this->originResult = $result;
        $result = json_decode($result);
        $result_info = $result->resultInfo;
        $this->resultInfo = $result_info;
        $this->respCode = $result_info->respCode;
        $this->respDesc = $result_info->respDesc;
        $this->parseBusiness($result_info);
        return $this;
    }

    abstract protected function parseBusiness($result_info);
}