<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/3
 * Time: 17:04
 */

namespace LenoveConnect\Servers;


abstract class BaseService
{
    /**
     * 网关地址
     *
     * @var string
     */
    protected $gatewayUrl = 'http://gla.lenovomm.com//httpOpenServer/serviceProvide';

    /**
     * 系统参数
     *
     * @var array
     */
    protected $systemParam = [
        'appKey' => '',
        'custId' => '',
        'serverName' => '',
        'sign' => '',
        'randomId' => '',
    ];

    /**
     * 业务参数
     *
     * @var array
     */
    protected $param = [];

    /**
     * 请求参数校验
     *
     * @return mixed
     */
    abstract protected function checkParam();

    /**
     * 解析请求结果
     *
     * @param $result
     * @return mixed
     */
    abstract protected function parseResult($result);

    /**
     * 执行请求
     *
     * @param array $param
     * @param array $sysParam
     * @return mixed
     */
    public function exec($param = [], $sysParam = [], $mock = false)
    {
        //设置接口参数
        $this->setBusinessParam($param);
        //设置系统参数
        $this->setSysParam($sysParam);
        //参数检测
        $this->checkParam();
        //签名计算
        $this->generateSign();
        //发起请求
        return $this->request($mock);
    }

    /**
     * 设置系统参数(除sign)
     *
     * @param array $sysParam
     */
    public function setSysParam(array $sysParam)
    {
        foreach ($sysParam as $field => $value) {
            if (array_key_exists($field, $this->systemParam)) {
                $this->systemParam[$field] = $value;
            }
        }

        $this->systemParam['serverName'] = static::ServerName;
        $this->systemParam['randomId'] = $this->generateRandomId();
    }

    /**
     * 设置业务参数
     *
     * @param array $param
     */
    public function setBusinessParam(array $param)
    {
        foreach ($param as $k => $v) {
            if (array_key_exists($k, $this->param)) {
                $this->param[$k] = $v;
            }
        }
    }

    /**
     * 系统参数空值检测(除sign)
     *
     * @throws \Error
     */
    protected function checkSysParam()
    {
        foreach ($this->systemParam as $field => $val) {
            if (empty($val) && $field != 'sign') {
                throw new \Error("$field can not be empty");
            }
        }
    }

    /**
     * 生成随机数
     *
     * @return string
     */
    protected function generateRandomId()
    {
        $ran_str = mt_rand(100, 999);
        return $ran_str . date('YmdHis') . $ran_str;
    }

    /**
     * 生成签名
     */
    protected function generateSign()
    {
        $param = array_merge($this->param, $this->systemParam);
        $app_key = $param['appKey'];
        unset($param['sign']);
        unset($param['appKey']);
        ksort($param);
        $str = $app_key;
        foreach ($param as $field => $value) {
            $str .= $field . $value;
        }
        $str .= $app_key;
        $this->param['sign'] = md5($str);
    }

    /**
     * 请求接口 TODO 结果处理
     *
     * @return mixed
     */
    protected function request($mock = false)
    {
        $params = array_merge($this->systemParam, $this->param);
        $url = $this->gatewayUrl . '?' . http_build_query($params);

        if ($mock) {
            return $url;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $this->parseResult($result);
    }
}