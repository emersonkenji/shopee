<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class payment extends config
{


    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_DEVELOPMENT_STATUS')){
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

    public function setShopInstallmentStatus($accestoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/set_shop_installment_status', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/set_shop_installment_status?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShopInstallmentStatus($accestoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_shop_installment_status', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_shop_installment_status?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
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

    public function setItemInstallmentStatus($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/set_item_installment_status', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/set_item_installment_status?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getItemInstallmentStatus($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_item_installment_status', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_item_installment_status?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getPaymentMethodList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_payment_method_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_payment_method_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getWalletTransactionList($accesstoken, $shop_id, $page_no, $page_size, $create_time_from, $create_time_to, $transaction_type, $wallet_type, $money_flow, $transaction_tab_type)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_wallet_transaction_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_wallet_transaction_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp. '&page_no='.$page_no.'&page_size='.$page_size.'&create_time_from='.$create_time_from.'&create_time_to='.$create_time_to.'&wallet_type='.$wallet_type.'&transaction_type='.$transaction_type.'&money_flow='.$money_flow.'&transaction_tab_type='.$transaction_tab_type;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getEscrowList($accesstoken, $shop_id, $release_time_from, $release_time_to, $page_size, $page_no)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_escrow_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_escrow_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp.'&release_time_from='.$release_time_from.'&release_time_to='.$release_time_to.'&page_size='.$page_size.'&page_no='.$page_no;
        $response = $this->shopee->getMethod($argument);
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


    public function getBillingTransactionInfo($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_billing_transaction_info', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_billing_transaction_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PARTNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument, $data);
        return $response;
    }

    public function getEscrowDetailBatch($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_escrow_detail_batch', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/payment/get_escrow_detail_batch?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
