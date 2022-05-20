<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if (!function_exists('redisSetService'))
{
    function redisSetService($params)
    {
        extract($params);
        $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
  $redis->set("username",$username);
  $redis->set("password",$password);
  
  return true;


    }
}

if (!function_exists('redisGetService'))
{
    function redisGetService($params)
    {
        extract($params);
        $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
 $username =  $redis->set("username");
 $password = $redis->set("password",);
  
   $arr = array("username"=>$username,"password"=>$password);
  return $arr;
  

    }
}

if (!function_exists('redisDelservice'))
{
    function redisDelservice($params)
    {
        extract($params);
        $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
 $username =  $redis->del("username");
 $password = $redis->del("password",);
   
 
  return true;
  

    }
}

?>