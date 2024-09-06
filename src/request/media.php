<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class media extends config
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

    public function initVideoUpload($accestoken, $shop_id, $data = [])
    {
        $sign = $this->getGenerateSign('/api/v2/media_space/init_video_upload', time(), $accestoken, $shop_id);
        $url = $this->url . '/api/v2/media_space/init_video_upload?partner_id=' . env('SHOPEE_PATNER_ID') .'&shop_id='.$shop_id.'&access_token='.$accestoken. '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethod($url, $data);
        return $response;
    }

    public function uploadVideoPart($accestoken, $shop_id, $data = [])
    {
        $sign = $this->getGenerateSign('/api/v2/media_space/upload_image', time(), $accestoken, $shop_id);
        $url = $this->url . '/media_space/upload_video_part?partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($url, $data);
        return $response;
    }

    public function completeVideoUpload($url, $data = [])
    {
        $suburl = $url . '/media_space/complete_video_upload';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getVideoUploadResult($url, $authcode, $shop_id, $video_upload_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = $url . '/media_space/get_video_upload_result?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest . '&video_upload_id=' . $video_upload_id;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function cancelVideoUpload($url, $data = [])
    {
        $suburl = $url . '/media_space/cancel_video_upload';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function uploadImage($data)
    { 
        $sign = $this->getSign('/api/v2/media_space/upload_image');
        $url = $this->url . '/api/v2/media_space/upload_image?partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethodFile($url, $data);
        return $response;
    }


}
