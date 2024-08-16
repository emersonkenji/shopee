<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class shopcategory extends config
{

    private  $shopee;

    public function __construct()
    {
        $this->shopee = new shopee();
    }

    public function addShopeCategory($url, $data = [])
    {
        $argument = $url . '/shop_category/add_shop_category';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShopCategoryList($url, $data = [])
    {
        $argument = $url . '/shop_category/get_shop_category_list';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteShopCategory($url, $data = [])
    {
        $argument = $url . '/shop_category/delete_shop_category';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateShopCategory($url, $data = [])
    {
        $argument = $url . '/shop_category/update_shop_category';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addItemList($url, $data = [])
    {
        $argument = $url . '/shop_category/add_item_list';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getItemList($url, $data = [])
    {
        $argument = $url . '/shop_category/get_item_list';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteItemList($url, $data = [])
    {
        $argument = $url . '/shop_category/delete_item_list';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
