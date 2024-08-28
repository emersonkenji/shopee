<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class payment extends config
{


    private  $partnerid, $shopee, $url;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();

        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_STATUS_STAGING') == 'Production'){
            $this->url = 'https://partner.shopeemobile.com';
        }

    }



    public function getEscrowDetail($accestoken, $shop_id, $order_sn)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_escrow_detail', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_escrow_detail?access_token=' . $accestoken . '&order_sn=' . $order_sn . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
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

    public function getPayoutDetail($accesstoken, $shop_id, $start_date, $end_date)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_payout_detail', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_payout_detail?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp . "&payout_time_from=" . $start_date . "&payout_time_to=" . $end_date . "&page_no=1&page_size=100";
        $response = $this->shopee->getMethod($argument);
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

    public function getPayoutInfo($accesstoken, $shop_id, $start_date, $end_date)
{
    $cursor = "";
    $timestamp = time();
    $sign = $this->getGenerateSign('/api/v2/payment/get_payout_info', $timestamp, $accesstoken, $shop_id);
    $argument = $this->url . '/api/v2/payment/get_payout_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PARTNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp . "&payout_time_from=" . $start_date . "&payout_time_to=" . $end_date . "&page_size=100&cursor=" . $cursor;

    $response = $this->shopee->getMethod($argument);
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
