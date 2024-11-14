<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class media extends config
{

    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_PRODUCTION_STATUS')){
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
        $sign = $this->getGenerateSign('/api/v2/media_space/upload_video_part', time(), $accestoken, $shop_id);
        $url = $this->url . '/api/v2/media_space/upload_video_part?access_token='.$accestoken.'&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethod($url, $data);
        return $response;
    }

    public function completeVideoUpload($accestoken, $shop_id, $data = [])
    {
        $sign = $this->getGenerateSign('/api/v2/media_space/complete_video_upload', time(), $accestoken, $shop_id);
        $suburl = $this->url . '/api/v2/media_space/complete_video_upload?access_token='.$accestoken.'&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getVideoUploadResult($accestoken, $shop_id, $video_upload_id)
    {
        $sign = $this->getGenerateSign('/api/v2/media_space/complete_video_upload', time(), $accestoken, $shop_id);
        $suburl = $this->url . '/api/v2/media_space/get_video_upload_result?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . time() . '&video_upload_id=' . $video_upload_id;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function cancelVideoUpload($accestoken, $shop_id, $data = [])
    {
        $sign = $this->getGenerateSign('/api/v2/media_space/cancel_video_upload', time(), $accestoken, $shop_id);
        $suburl = $this->url . '/api/v2/media_space/cancel_video_upload?access_token='.$accestoken.'&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function uploadImage($accestoken, $shop_id, $data = [])
    { 
        $sign = $this->getGenerateSign('/api/v2/media_space/upload_image', time(), $accestoken, $shop_id);
        $url = $this->url . '/api/v2/media_space/upload_image?access_token='.$accestoken.'&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethodFile($url, $data);
        return $response;
    }


}
