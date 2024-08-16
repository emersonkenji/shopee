<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class media extends config
{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function initVideoUpload($data = [])
    {
        $suburl = '/media_space/init_video_upload';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function uploadVideoPart($data = [])
    {
        $sign = parent::getSign();
        $suburl = '/media_space/upload_video_part?partner_id=' . $this->$this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function completeVideoUpload($data = [])
    {
        $suburl = '/media_space/complete_video_upload';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getVideoUploadResult($authcode, $shop_id, $video_upload_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/media_space/get_video_upload_result?access_token=' . $access_token . '&partner_id=' . $this->$this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest . '&video_upload_id=' . $video_upload_id;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function cancelVideoUpload($data = [])
    {
        $suburl = '/media_space/cancel_video_upload';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function uploadImage($data = []){ 
        $sign = parent::getSign();
        $suburl = '/media_space/upload_image?partner_id='.$this->$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
}
