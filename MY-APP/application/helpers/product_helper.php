<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('productValidate'))
{
    function productValidate($params)
    {
        extract($params);
        $anou = new stdClass;

        if(empty($name) ||empty($category) || empty($countInStock)  || empty( $price) ||empty($image)){
$anou->success = false;
$anou->messages ="missing infomation";
return $anou;

    }else{
        $anou->success = true;
        $anou->messages ="all good";
        return $anou;   
    }
}
}

?>