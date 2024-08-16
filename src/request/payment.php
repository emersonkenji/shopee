<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class payment extends config{


    private $config, $partnerid, $partnerkey, $shopee, $access_token;
    
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }



    public function getEscrowDetail($data = []){
        $suburl = '/payment/get_escrow_detail';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function setShopInstallmentStatus($data = []){
        $suburl = '/payment/set_shop_installment_status ';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    } 

    public function getShopInstallmentStatus($data = []){
        $suburl = '/payment/get_shop_installment_status';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getPayoutDetail($data = []){
        $suburl = '/payment/get_payout_detail';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function setItemInstallmentStatus($data = []){
        $suburl = '/payment/set_item_installment_status';
        $response = $this->shopee->getMethod($suburl, $data);   
        return $response;
    }

    public function getItemInstallmentStatus($data = []){
        $suburl = '/payment/get_item_installment_status';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getPaymentMethodList($data = []){
        $suburl = '/payment/get_payment_method_list';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getWalletTransactionList($data = []){
        $suburl = '/payment/get_wallet_transaction_list';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getEscrowList($data = []){
        $suburl = '/payment/get_escrow_list';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getPayoutInfo($data = []){
        $suburl = '/payment/get_payout_info';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getBillingTransactionInfo($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/payment/get_billing_transaction_info?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl, $data);
        return $response;
    }

    public function getEscrowDetailBatch($data = []){
        $suburl = '/payment/get_escrow_detail_batch';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    

}