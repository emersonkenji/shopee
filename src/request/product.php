<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;
use Faiznurullah\Shopee\shopee;

class product extends config{
    
    
    private $config, $partnerid, $partnerkey, $shopee, $access_token;
    
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }
    
    
    public function getProduct($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign(); 
        $suburl = '/product/get_category?access_token='.$access_token.'&language=id&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getAttribute($authcode, $shop_id, $category_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign(); 
        $suburl = '/product/get_attributes?access_token='.$access_token.'&category_id='.$category_id.'&language=id&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getAttributeTree($authcode, $shop_id, $category_id_list){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $category_id_list = implode(',', $category_id_list);
        $suburl = '/product/get_attribute_tree?access_token='.$access_token.'&category_id_list='.$category_id_list.'&language=id&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    
    public function getBrandList($authcode, $shop_id, $category_id, $offset = 0, $page_size = 10){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/get_brand_list?access_token='.$access_token.'&category_id='.$category_id.'&language=id&offset='.$offset.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&status=1&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getItemLimit($authcode, $shop_id, $category_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/get_item_limit?access_token='.$access_token.'&category_id='.$category_id.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    
    public function getItemList($authcode, $shop_id, $item_status, $offset = 0, $page_size = 10, $update_time_from, $update_time_to){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/get_item_list?access_token='.$access_token.'&item_status='.$item_status.'&offset='.$offset.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest.'&update_time_from='.$update_time_from.'&update_time_to='.$update_time_to;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getItemBaseInfo($authcode, $shop_id, $item_ids = [], ){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $item_ids_list = implode(',', $item_ids);
        $suburl = '/product/get_item_base_info?access_token='.$access_token.'&item_id_list='.urlencode($item_ids_list).'&need_complaint_policy=true&need_tax_info=true&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getItemExtraInfo($authcode, $shop_id, $item_id_list){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $item_id_array = implode(',', $item_id_list);
        $suburl = '/product/get_item_extra_info?access_token='.$access_token.'&item_id_list='.$item_id_array.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function addItem($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/add_item?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl,  $data);
        return $response;
    }
    
    public function updateItem($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/update_item?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function deleteItem($data = []){
        $suburl = '/product/delete';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }
    
    
    public function initTierVariation($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/init_tier_variation?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;  
    }
    
    public function updateTierVariation($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/update_tier_variation?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function getModelList($authcode, $shop_id, $item_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/get_model_list?access_token='.$access_token.'&item_id='.$item_id.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function addModel($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/add_model?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='. $sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function updateModel($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/update_model?access_token='.$access_token .'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign .'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    // Delete model not finish
    public function deleteModel($data = []){
        $suburl = '/product/delete_model';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }
    
    
    public function supportSizeChart($authcode, $shop_id, $category_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/support_size_chart?access_token='.$access_token.'&category_id='.$category_id.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    // not finish
    public function updateSizeChart($data = []){
        $suburl = '/product/update_size_chart';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function unlistItem($data = []){
        $suburl = '/product/unlist_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function updatePrice($data = []){
        $suburl = '/product/update_price';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function updateStock($data = []){
        $suburl = '/product/update_stock';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function boostItem($data = []){
        $suburl = '/product/boost_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function getBoostedList($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/get_boosted_list?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    
    public function getItemPromotion($authcode, $shop_id, $item_id_list= []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $item_id_list_nice = implode(',', array_map('strval', $item_id_list));
        $suburl = '/product/get_item_promotion?access_token='.$access_token.'&item_id_list='.$item_id_list_nice.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function updateSipItemPrice($data = []){
        $suburl = '/product/update_sip_item_price';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function searchItem($authcode, $shop_id, $attribute, $item_name, $offset, $page_size){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/search_item?access_token='.$access_token.'&attribute_status='.$attribute.'&item_name='.$item_name.'&offset='.$offset.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getComment($authcode, $shop_id, $comment_id, $item_id, $page_size){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/product/get_comment?access_token='.$access_token.'&comment_id='.$comment_id.'&item_id='.$item_id.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function replyComment($data = []){
        $suburl = '/product/reply_comment';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function registerBrand($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/product/register_brand?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }
    
    public function getRecommendedAttribute($authcode, $shop_id, $category_id, $cover_image_id, $item_name){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/product/get_recommend_attribute?access_token='.$access_token.'&category_id='.$category_id.'&cover_image_id='.$cover_image_id.'&item_name='.$item_name.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getProductInfo($data = []){
        $suburl = '/item/get_product_info';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }
    
    public function getWeightRecommendation($data = []){
        $suburl = '/product/get_weight_recommendation';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }
    
    public function getSizeChartList($authcode, $shop_id, $category_id, $cursor, $page_size){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/product/get_size_chart_list?access_token='.$access_token.'&category_id='.$category_id.'&cursor='.$cursor.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    
    public function getSizeChartDetail($authcode, $shop_id, $size_chart_id){

        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/product/get_size_chart_detail?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&size_chart_id='.$size_chart_id.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response; 
    }

    public function getItemViolationInfo($data = []){
        $suburl = '/product/get_item_violation_info ';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getVariations($authcode, $shop_id, $category_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/product/get_variations?access_token='.$access_token.'&category_id='.$category_id.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getAllVehicleList($authcode, $shop_id, $offset, $page_size){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/product/get_all_vehicle_list?access_token='.$access_token.'&language=id&offset='.$offset.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getVehicleListByCompatibilityDetail($authcode, $shop_id, $brand_id, $model_id, $year_id){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/product/get_vehicle_list_by_compatibility_detail?access_token='.$access_token.'&brand_id='.$brand_id.'&compatibility_details=Brand&language=id&model_id='.$model_id.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest.'&year_id='.$year_id;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
}