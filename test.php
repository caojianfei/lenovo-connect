<?php

require_once __DIR__ . "/vendor/autoload.php";

use LenoveConnect\Client;

$result = Client::SurplusFlowQuery(
    [
        'iccid' => '121324'
    ],
    [
        'appKey' => '123456',
        'custId' => '7654321'
    ],
    false
);

var_dump($result->respCode);
var_dump($result->resultInfo);
var_dump($result->respDesc);
var_dump($result->surplusFlowValue);




