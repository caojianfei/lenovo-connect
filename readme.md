# 联想懂的通信全球智联平台通用服务接口协议 `php sdk`

## 调用案例

> 剩余流量查询
    
    <?php
    
    use LenoveConnect\Client;
    
    $business_param = ['iccid' => '123456'];
    $system_param = [
        'appKey' => '1111111', 
        'custId' => '000000'
    ];
    
    $result = Client::SurplusFlowQueryResult($business_param, $system_param);
    
或者
    
    <?php
    
    use LenoveConnect\Servers\SurplusFlowQuery;
    
    $api = new SurplusFlowQuery();
    $business_param = ['iccid' => '123456'];
    $system_param = [
        'appKey' => '1111111', 
        'custId' => '000000'
    ];
    $result = $api->exec($business_param, $system_param);
    
或者

    use LenoveConnect\Servers\SurplusFlowQuery;
        
    $api = new SurplusFlowQuery();
    $business_param = ['iccid' => '123456'];
    $system_param = [
        'appKey' => '1111111', 
        'custId' => '000000'
    ];
    
    $api->setBusinessParam($business_param);
    $api->setsetSysParam($system_param);
    $result = $api->exec();