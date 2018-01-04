<?php
/**
 * Created by PhpStorm.
 * User: caojf
 * Date: 2018/1/4
 * Time: 16:11
 */

namespace LenoveConnect\Results;


class ProductQueryResult extends BaseResult
{
    /**
     * @var ProductItem[]
     */
    public $products = [];

    public function parseBusiness($result_info)
    {
        if ($this->respCode === '0000') {
            $this->products = $result_info->products;
        }
    }
}