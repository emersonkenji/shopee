<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class voucher extends config
{


    private $shopee;
    public function __construct()
    { 
        $this->shopee = new shopee();
    }

    public function addVoucher($data = [])
    {
        $suburl = '/voucher/add_voucher';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteVoucher($data = []){
        $suburl = '/voucher/delete_voucher';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function endVoucher($data = []){
        $suburl = '/voucher/end_voucher';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateVoucher($data = []){
        $suburl = '/voucher/update_voucher';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getVoucher($data = []){
        $suburl = '/voucher/get_voucher';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getVoucherList($data = []){
        $suburl = '/voucher/get_voucher_list';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }


}
