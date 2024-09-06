<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class product extends config
{
    
    
    private $partnerid, $shopee, $url;
    
    public function __construct($partnerid)
    { 
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_STATUS_STAGING') == 'Production'){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }
    
    
    
    public function getCategory($accestoken, $shop_id)
    { 
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_category', $timestamp, $accestoken, $shop_id);
        $argument =  $this->url.'/api/v2/product/get_category?access_token='.$accestoken.'&language=id&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp; 
        $response = $this->shopee->getMethod($argument);
        return $response;
        
    }
    
    public function getAttribute($url, $authcode, $shop_id, $category_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/get_attributes?access_token=' . $access_token . '&category_id=' . $category_id . '&language=id&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getAttributeTree($url, $authcode, $shop_id, $category_id_list)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $category_id_list = implode(',', $category_id_list);
        $argument = $url . '/product/get_attribute_tree?access_token=' . $access_token . '&category_id_list=' . $category_id_list . '&language=id&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    
    public function getBrandList($accestoken, $shop_id, $category_id, $offset = 0, $page_size = 10)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_brand_list', $timestamp, $accestoken, $shop_id);
        $argument = $this->url. '/api/v2/product/get_brand_list?access_token=' . $accestoken . '&category_id=' . $category_id . '&language=id&offset=' . $offset . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&status=1&timestamp=' . time();
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getItemLimit($url, $authcode, $shop_id, $category_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/get_item_limit?access_token=' . $access_token . '&category_id=' . $category_id . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    
    public function getItemList($accesstoken, $shop_id, $item_status = "NORMAL", $offset = 0, $page_size = 100)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_item_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_item_list?access_token=' . $accesstoken . '&item_status=' . $item_status . '&offset=' . $offset . '&page_size=' . $page_size . '&partner_id=' .  env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getItemBaseInfo($accestoken, $shop_id, $item_ids)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_item_base_info', $timestamp, $accestoken, $shop_id);
        $item_ids_list = implode(',', $item_ids);
        $argument = $this->url . '/api/v2/product/get_item_base_info?access_token=' . $accestoken . '&item_id_list=' . urlencode($item_ids_list) . '&need_complaint_policy=true&need_tax_info=true&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getItemExtraInfo($url, $authcode, $shop_id, $item_id_list)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $item_id_array = implode(',', $item_id_list);
        $argument = $url . '/product/get_item_extra_info?access_token=' . $access_token . '&item_id_list=' . urlencode($item_id_array) . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function addItem($accestoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/add_item', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/product/add_item?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateItem($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/update_item?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function deleteItem($accestoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/delete_item', $timestamp, $accestoken, $shop_id); 
        $url = $this->url.'/api/v2/product/delete_item?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethod($url, $data);
        return $response;
    }
    
    public function initTierVariation($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/init_tier_variation', $timestamp, $accesstoken, $shop_id); 
        $argument = $this->url . '/api/v2/product/init_tier_variation?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateTierVariation($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/update_tier_variation?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getModelList($accesstoken, $shop_id, $item_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_model_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_model_list?access_token=' . $accesstoken . '&item_id=' . $item_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function addModel($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/add_model', $timestamp, $accesstoken, $shop_id); 
        $argument = $this->url . '/api/v2/product/add_model?access_token=' . $accesstoken . '&partner_id=' .  env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateModel($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/update_model?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function deleteModel($url, $data = [])
    {
        $argument = $url . '/product/delete_model';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function supportSizeChart($url, $authcode, $shop_id, $category_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/support_size_chart?access_token=' . $access_token . '&category_id=' . $category_id . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function updateSizeChart($url, $data = [])
    {
        $argument = $url . '/product/update_size_chart';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function unlistItem($url, $data = [])
    {
        $argument = $url . '/product/unlist_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updatePrice($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/update_price', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/update_price?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp; 
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateStock($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/update_stock', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/update_stock?access_token='.$accesstoken.'&language=id&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp; 
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function boostItem($url, $data = [])
    {
        $argument = $url . '/product/boost_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getBoostedList($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/get_boosted_list?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getItemPromotion($url, $authcode, $shop_id, $item_id_list = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $item_id_list_nice = implode(',', array_map('strval', $item_id_list));
        $argument = $url . '/product/get_item_promotion?access_token=' . $access_token . '&item_id_list=' . urlencode($item_id_list_nice) . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function updateSipItemPrice($url, $data = [])
    {
        $argument = $url . '/product/update_sip_item_price';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function searchItem($url, $authcode, $shop_id, $attribute, $item_name, $offset, $page_size)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/search_item?access_token=' . $access_token . '&attribute_status=' . $attribute . '&item_name=' . $item_name . '&offset=' . $offset . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getComment($url, $authcode, $shop_id, $comment_id, $item_id, $page_size)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/product/get_comment?access_token=' . $access_token . '&comment_id=' . $comment_id . '&item_id=' . $item_id . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function replyComment($url, $data = [])
    {
        $argument = $url . '/product/reply_comment';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    
    public function registerBrand($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = $this->getSign();
        $argument = $url . '/product/register_brand?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getRecommendedAttribute($url, $authcode, $shop_id, $category_id, $cover_image_id, $item_name)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = $this->getSign();
        $argument = $url . '/product/get_recommend_attribute?access_token=' . $access_token . '&category_id=' . $category_id . '&cover_image_id=' . $cover_image_id . '&item_name=' . $item_name . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        
        return $this->shopee->getMethod($argument);
    }
    
    public function getProductInfo($url, $data = [])
    {
        $argument = $url . '/item/get_product_info';
        
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getWeightRecommendation($url, $data = [])
    {
        $argument = $url . '/product/get_weight_recommendation';
        
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getSizeChartList($url, $authcode, $shop_id, $category_id, $cursor, $page_size)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = $this->getSign();
        $argument = $url . '/product/get_size_chart_list?access_token=' . $access_token . '&category_id=' . $category_id . '&cursor=' . $cursor . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        
        return $this->shopee->getMethod($argument);
    }
    
    public function getSizeChartDetail($url, $authcode, $shop_id, $size_chart_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = $this->getSign();
        $argument = $url . '/product/get_size_chart_detail?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&size_chart_id=' . $size_chart_id . '&timestamp=' . $this->timest;
        
        return $this->shopee->getMethod($argument);
    }
    
    public function getItemViolationInfo($url, $data = [])
    {
        $argument = $url . '/product/get_item_violation_info';
        
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getVariations($url, $authcode, $shop_id, $category_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = $this->getSign();
        $argument = $url . '/product/get_variations?access_token=' . $access_token . '&category_id=' . $category_id . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        
        return $this->shopee->getMethod($argument);
    }
    
    public function getAllVehicleList($url, $authcode, $shop_id, $offset, $page_size)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = $this->getSign();
        $argument = $url . '/product/get_all_vehicle_list?access_token=' . $access_token . '&language=id&offset=' . $offset . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        
        return $this->shopee->getMethod($argument);
    }
    
    public function getVehicleListByCompatibilityDetail($url, $authcode, $shop_id, $brand_id, $model_id, $year_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = $this->getSign();
        $argument = $url . '/product/get_vehicle_list_by_compatibility_detail?access_token=' . $access_token . '&brand_id=' . $brand_id . '&compatibility_details=Brand&language=id&model_id=' . $model_id . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest . '&year_id=' . $year_id;
        
        return $this->shopee->getMethod($argument);
    }
}
