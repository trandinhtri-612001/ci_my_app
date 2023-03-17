<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('productValidate'))
{
    function productValidate($params)
    {
        extract($params);
        $anou = new stdClass;
        $checkProductName = '/^\w{5,}$/';
        $checkPrice = "/\d+(?:\.\d{1,2})?/";
        

        if(empty($name) ||empty($category) || empty($countInStock)  || empty( $price) ||empty($image)){
            $anou->success = false;
            $anou->messages ="missing infomation";
            return $anou;

    }else{
        if(preg_match($checkProductName,$name)){
            $anou->success = false;
            $anou->messages ="Invalid Product Name";
            return $anou;
        }
        if(preg_match($checkProductName,$category)){
            $anou->success = false;
            $anou->messages ="Invalid Product category";
            return $anou;
        }
        if(!preg_match($checkPrice,$price)){
            $anou->success = false;
            $anou->messages ="Invalid Product price";
            return $anou;
        }


        $anou->success = true;
        $anou->messages ="all good";
        return $anou;   
    }
}
}

?>