<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class payment extends config
{


    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }



    public function getEscrowDetail($url, $data = [])
    {
        $argument = $url . '/payment/get_escrow_detail';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function setShopInstallmentStatus($url, $data = [])
    {
        $argument = $url . '/payment/set_shop_installment_status';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getShopInstallmentStatus($url, $data = [])
    {
        $argument = $url . '/payment/get_shop_installment_status';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getPayoutDetail($url, $data = [])
    {
        $argument = $url . '/payment/get_payout_detail';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function setItemInstallmentStatus($url, $data = [])
    {
        $argument = $url . '/payment/set_item_installment_status';
        $response = $this->shopee->getMethod($argument, $data);
        return $response;
    }

    public function getItemInstallmentStatus($url, $data = [])
    {
        $argument = $url . '/payment/get_item_installment_status';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getPaymentMethodList($url, $data = [])
    {
        $argument = $url . '/payment/get_payment_method_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getWalletTransactionList($url, $data = [])
    {
        $argument = $url . '/payment/get_wallet_transaction_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getEscrowList($url, $data = [])
    {
        $argument = $url . '/payment/get_escrow_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getPayoutInfo($url, $data = [])
    {
        $argument = $url . '/payment/get_payout_info';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getBillingTransactionInfo($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/payment/get_billing_transaction_info?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument, $data);
        return $response;
    }

    public function getEscrowDetailBatch($url, $data = [])
    {
        $argument = $url . '/payment/get_escrow_detail_batch';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
