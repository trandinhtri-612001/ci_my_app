
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('validateUser'))
{
    function validateUser($params)
    {
        extract($params);
        $anou = new stdClass;
        $checkUsername = '/^\w{5,}$/';
        $checkEmail = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';
        $checkPhone = '/^[0-9]{9,14}\z/';
        $checkDate = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
        $checkPass = "#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#";
        
        if(empty($username) ||empty($email) || empty($phone)  || empty( $date) ||empty($password)){
            $anou->success = false;
            $anou->messages = "missing infomation";
            return $anou;

        }else{
            if(preg_match($checkUsername , $username)){
                $anou->success = false;
                $anou->messages = "Invalid Username";
                return $anou;
            }
            if(!preg_match($checkEmail, $email)){
                $anou->success = false;
                $anou->messages = "Invalid email";
                return $anou;
            }
            if(!preg_match($checkPhone, $phone)){
                $anou->success = false;
                $anou->messages = "Invalid phone";
                return $anou;
            }
            if(!preg_match($checkDate,$date)){
                $anou->success = false;
                $anou->messages = "Invalid date";
                return $anou;
            }
            if(!preg_match($checkPass,$password)){
                $anou->success = false;
                $anou->messages = "Invalid password";
                return $anou;
            }
            //all good

             $anou->success = true;
                $anou->messages = "all good";
                return $anou;
        }
     


    }
}

if (!function_exists('my_second_function'))
{
    function my_second_function($params)
    {
        //Your code here
    }
}




?>