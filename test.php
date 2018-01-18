<?php

require_once __DIR__ . "/vendor/autoload.php";

use LenoveConnect\Client;

//移动卡
$china_mobile  = '898607B1191791143829';
//电信卡
$china_telecom = '8986031646202015893H';
//联通卡
$china_unicom  = '8986061703000054512J';

$iccid = $china_unicom;

$sys_config = [
    'appKey' => '7S3331ojj29lj19Nr4n41k25jD9obp',
    'custId' => '3071630315090668'
];

function encodeStr2GBK($str) {
   $encode = mb_detect_encoding($str, array("ASCII","UTF-8","GB2312","GBK","BIG5"));
   return mb_convert_encoding($str, 'GBK', $encode);
}

//剩余流量查询
//$result = Client::SurplusFlowQuery(['iccid' => $iccid], $sys_config);
//var_dump($result->surplusFlowValue);
//var_dump($result->userFlowValue);

//日流量查询
//$day_date = date("Y-m-d");
//$result = Client::DayFlowQuery(['iccid'=> $iccid, 'dayDate' => $day_date], $sys_config);

//月流量查询
//$day_date = date("Y-m");
//$result = Client::MonthFlowQuery(['iccid'=> $iccid, 'dayDate' => $day_date], $sys_config);

/**
 * 卡激活
 *
 * @param $iccid
 * @return \LenoveConnect\Results\CardActivateChangeResult
 */
function cardActivateChange($iccid) {
    global $sys_config;

    $result = Client::CardActivateChange(['iccid' => $iccid], $sys_config);
    return $result;
}

/**
 * 卡状态查询
 * @param $iccid
 * @return \LenoveConnect\Results\CardStateQueryResult
 */
function cardStateQuery($iccid) {
    global $sys_config;
    $result = Client::CardStateQuery(['iccid' => $iccid], $sys_config);
    var_dump($result);
    return $result;
}

/**
 * 流量订购
 * @param $iccid
 * @return \LenoveConnect\Results\FlowOrderChangeResult | void
 */
function flowOrderChange($iccid) {
    global $sys_config;

    $queryProducts = Client::ProductQuery(['iccid' => $iccid], $sys_config);

    if ($queryProducts->respCode === '0000') {
        $products = $queryProducts->products;
        $product = $products[0];
        $product_id = $product->goodsId;

        //订购
        $result = Client::FlowOrderChange(['iccid' => $iccid, 'goodsId' => $product_id], $sys_config);
        var_dump($result);
        var_dump(encodeStr2GBK($result->respDesc));
        return $result;
    } else {
        var_dump($queryProducts);
    }
}

/**
 * 设置开停机状态
 *
 * @param $iccid
 * @param $state
 * @return \LenoveConnect\Results\CardHandleStopOnResult
 */
function cardHandleStopOn($iccid, $state) {
    global $sys_config;

    $result = Client::CardHandleStopOn(['iccid' => $iccid, 'stateCode' => $state], $sys_config, false);
    return $result;
}

cardStateQuery($china_mobile);




