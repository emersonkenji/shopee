<?php
 namespace Faiznurullah\Shopee;

 use Faiznurullah\Shopee\config;

 class payment extends config{


    private $config, $partnerid, $partnerkey, $shopee, $access_token;
    
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getReturnDetail($data = []){
       $suburl = '/returns/get_return_detail';
       $response = $this->shopee->getMethodWithPayload($suburl, $data);
       return $response;
    }


    public function getReturnList($data = []){
        $suburl = '/returns/get_return_list';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function returnConfirm($data = []){ 
        $suburl = '/returns/confirm';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }


    public function dispute($data){
       $suburl = '/returns/dispute';
       $response = $this->shopee->postMethod($suburl, $data);
       return $response;
    }

    public function getAvailableSolutions($authcode, $shop_id, $return_sn){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/get_available_solutions?access_token='.$access_token.'&partner_id='.$this->partnerid.'&return_sn='.$return_sn.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function offer($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/offer?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function acceptOffer($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/accept_offer?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function convertImage($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/convert_image?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);  
        return $response;
    }

    public function uploadProof($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/upload_proof?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function queryProof($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/query_proof?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


    public function getReturnDispute($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/get_return_dispute_reason?access_token='.$access_token.'&partner_id='.$this->partnerid.'&return_sn=200203171852695&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


 }