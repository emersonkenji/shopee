<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class product extends config
{
    
    
    private  $shopee, $url;
    public function __construct()
    { 
        $this->timest = time();  
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(filter_var(env('SHOPEE_PRODUCTION_STATUS', true), FILTER_VALIDATE_BOOLEAN)){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
        $this->shopee = new shopee(); 
    }
    
    
    
    public function getCategory($accestoken, $shop_id)
    { 
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_category', $timestamp, $accestoken, $shop_id);
        $argument =  $this->url.'/api/v2/product/get_category?access_token='.$accestoken.'&language=id&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp; 
        $response = $this->shopee->getMethod($argument);
        return $response;
        
    }
    
    public function getAttribute($accestoken, $shop_id, $category_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_attributes', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_attributes?access_token=' . $accestoken . '&category_id=' . $category_id . '&language=id&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getAttributeTree($accestoken, $shop_id, $category_id_list)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_attribute_tree', $timestamp, $accestoken, $shop_id);
        $category_id_list = implode(',', $category_id_list);
        $argument = $this->url . '/api/v2/product/get_attribute_tree?access_token=' . $accestoken . '&category_id_list=' . $category_id_list . '&language=id&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    
    public function getBrandList($accestoken, $shop_id, $category_id, $offset = 0, $page_size = 10)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_brand_list', $timestamp, $accestoken, $shop_id);
        $argument = $this->url. '/api/v2/product/get_brand_list?access_token=' . $accestoken . '&category_id=' . $category_id . '&language=id&offset=' . $offset . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&status=1&timestamp=' . time();
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getItemLimit( $accestoken, $shop_id, $category_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_item_limit', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_item_limit?access_token=' . $accestoken . '&category_id=' . $category_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
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
    
    public function getItemExtraInfo($accestoken, $shop_id, $item_id_list)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_item_extra_info', $timestamp, $accestoken, $shop_id);
        $item_id_array = implode(',', $item_id_list);
        $argument = $this->url . '/api/v2/product/get_item_extra_info?access_token=' . $accestoken . '&item_id_list=' . urlencode($item_id_array) . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
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
    
    public function updateItem($accestoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/update_item', $timestamp, $accestoken, $shop_id);   
        $argument = $this->url . '/api/v2/product/update_item?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
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
    
    public function updateTierVariation($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/update_tier_variation', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/update_tier_variation?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
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
    
    public function updateModel($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/update_model', $timestamp, $accesstoken, $shop_id); 
    
        $argument = $this->url . '/api/v2/product/update_model?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function deleteModel($url, $data = [])
    {
        $argument = $url . '/product/delete_model';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function supportSizeChart($accesstoken, $shop_id, $category_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/support_size_chart', $timestamp, $accesstoken, $shop_id); 
     
        $argument = $this->url . '/api/v2/product/support_size_chart?access_token=' . $accesstoken . '&category_id=' . $category_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function updateSizeChart($accesstoken, $shop_id, $data = [])
    {

        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/update_size_chart', $timestamp, $accesstoken, $shop_id); 
        $argument = $this->url . '/api/v2/product/update_size_chart?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function unlistItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/unlist_item', $timestamp, $accesstoken, $shop_id); 
        $argument = $this->url . '/api/v2/product/unlist_item?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp; 
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
    
    public function boostItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/boost_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/boost_item?access_token='.$accesstoken.'&language=id&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp; 
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getBoostedList($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_boosted_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_boosted_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID'). '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getItemPromotion($accesstoken, $shop_id, $item_id_list = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_item_promotion', $timestamp, $accesstoken, $shop_id);
        $item_id_list_nice = implode(',', array_map('strval', $item_id_list));
        $argument = $this->url . '/api/v2/product/get_item_promotion?access_token=' . $accesstoken . '&item_id_list=' . urlencode($item_id_list_nice) . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function updateSipItemPrice($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/update_sip_item_price', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/update_sip_item_price?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID'). '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function searchItem($accesstoken, $shop_id, $attribute, $item_name, $offset, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/search_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/search_item?access_token=' . $accesstoken . '&attribute_status=' . $attribute . '&item_name=' . $item_name . '&offset=' . $offset . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getComment($accesstoken, $shop_id, $comment_id, $item_id, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_comment', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_comment?access_token=' . $accesstoken . '&comment_id=' . $comment_id . '&item_id=' . $item_id . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function replyComment($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/reply_comment', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/reply_comment?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID'). '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    
    public function registerBrand($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/register_brand', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/register_brand?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;   
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getRecommendedAttribute($accesstoken, $shop_id, $category_id, $cover_image_id, $item_name)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_recommend_attribute', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_recommend_attribute?access_token=' . $accesstoken . '&category_id=' . $category_id . '&cover_image_id=' . $cover_image_id . '&item_name=' . $item_name . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        return $this->shopee->getMethod($argument);
    }
    
    public function getProductInfo($accesstoken, $shop_id, $data = [])
    { 
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_product_info', $timestamp, $accesstoken, $shop_id);
     
        $argument = $this->url . '/api/v2/item/get_product_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getWeightRecommendation($accesstoken, $shop_id, $data = [])
    {

        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_weight_recommendation', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/product/get_weight_recommendation?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getSizeChartList($accesstoken, $shop_id, $category_id, $cursor, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_size_chart_list', $timestamp, $accesstoken, $shop_id);
 
        $argument = $this->url . '/api/v2/product/get_size_chart_list?access_token=' . $accesstoken . '&category_id=' . $category_id . '&cursor=' . $cursor . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        return $this->shopee->getMethod($argument);
    }
    
    public function getSizeChartDetail($accesstoken, $shop_id, $size_chart_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_size_chart_detail', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url . '/api/v2/product/get_size_chart_detail?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&size_chart_id=' . $size_chart_id . '&timestamp=' . $timestamp; 
        return $this->shopee->getMethod($argument);
    }
    
    public function getItemViolationInfo($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_item_violation_info', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url . '/api/v2/product/get_item_violation_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp; 
        return $this->shopee->postMethod($argument, $data);
    }
    
    public function getVariations($accesstoken, $shop_id, $category_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_variations', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url . '/api/v2/product/get_variations?access_token=' . $accesstoken . '&category_id=' . $category_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;       
        return $this->shopee->getMethod($argument);
    }
    
    public function getAllVehicleList($accesstoken, $shop_id, $offset, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_all_vehicle_list', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url . '/api/v2/product/get_all_vehicle_list?access_token=' . $accesstoken . '&language=id&offset=' . $offset . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;       
        return $this->shopee->getMethod($argument);
    }
    
    public function getVehicleListByCompatibilityDetail($accesstoken, $shop_id, $brand_id, $model_id, $year_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/product/get_vehicle_list_by_compatibility_detail', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url . '/api/v2/product/get_vehicle_list_by_compatibility_detail?access_token=' . $accesstoken . '&brand_id=' . $brand_id . '&compatibility_details=Brand&language=id&model_id=' . $model_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp . '&year_id=' . $year_id;
        return $this->shopee->getMethod($argument);
    }
}
