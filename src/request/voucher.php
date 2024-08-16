<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class voucher extends config
{


    private $shopee;
    public function __construct()
    {
        $this->shopee = new shopee();
    }

    public function addVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/add_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/delete_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/end_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/update_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/get_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getVoucherList($url, $data = [])
    {
        $argument = $url . '/voucher/get_voucher_list';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
