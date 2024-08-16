<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class media extends config
{

    private  $partnerid, $shopee;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
    }

    public function initVideoUpload($url, $data = [])
    {
        $suburl = $url . '/media_space/init_video_upload';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function uploadVideoPart($url, $data = [])
    {
        $sign = parent::getSign();
        $suburl = $url . '/media_space/upload_video_part?partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
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

    public function uploadImage($url, $data = [])
    {
        $sign = parent::getSign();
        $suburl = $url . '/media_space/upload_image?partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
}
