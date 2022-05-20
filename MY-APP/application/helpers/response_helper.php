<?php

   function response($params){
    $ci= &get_instance();
    $ci->output->set_output(json_encode($params));
   }

function ojbResponse($success,$messages){
   $ojb =new stdClass;
   $ojb->success =$success;
   $ojb->messages = $messages;
   return $ojb;

}

?>