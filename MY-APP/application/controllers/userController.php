<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userController extends CI_Controller {
  public $userModel;
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		$this->load->model('userModel');
		$this->load->helper('user_helper');
		$this->load->helper('response_helper');
		$this->load->helper('redis_helper');

	}
	public function index()
	{
		echo "kushdfkjsdhfksdj";
	//    print_r($this->userModel->getuser()->result_array());

	}
	public function viewUser()
	{
		try{
			if(isset($_GET)){
			 $data['info']= $this->userModel->getuser()->result_array();
		$this->load->view('admin/user/index.php',$data);
		}
		}catch(Exception $err){
			$ojb =ojbResponse(false,$err->getMessage());
			response($ojb);
		}
		
        
	
	}
	public function viewAddUser(){
		try{
          if(isset($_GET)){
			$this->load->view('admin/user/addUser.php');
		}
		}catch(Exception $err){
			$ojb =ojbResponse(false,$err->getMessage());
			response($ojb);
		}
		
		 
	}

	
   


	public function addUser(){

	   $data_request = $_POST; 
	   try{
		    if(isset($_POST)){
		    extract($data_request);
			
        $res = validateUser($data_request);
        if(!$res->success){
		 response($res);

        }else{
	   $ojb =array('username'=>$username,'email'=>$email,'phone'=>$phone,'date'=>$date,'password'=>$password);
	 $resData =  $this->userModel->addUser($ojb);
	 redisSetService($ojb);
	 if($resData){
		
		$ojb =ojbResponse(true,"add user success");
		response($ojb);
		
	 }else{
		$ojb =ojbResponse(false,"add user do not  success");
		response($ojb);
	 }
        }
	  }
	   }catch(Exception $err){
		$ojb =ojbResponse(false,$err->getMessage());
		response($ojb);
	}
	 
		 
	   
	  
    }
	public function updateUser($id){
		try{
				if(isset($_GET)){
			$data['info'] = $this->userModel->getById($id)->result_array();
		$this->load->view('admin/user/updateUser.php',$data);
		}
	}catch(Exception $err){
		$ojb =ojbResponse(false,$err->getMessage());
		response($ojb);
	
		
	}
	}
	public function deleteUser(){
		$data_request = $_POST;
try{

		if(isset($_POST)){
			extract($data_request);
			$user = $this->userModel->getById($id);
			if(!$user){
				$ojb =ojbResponse(true,"delete userdo not  success");
				response($ojb);	
			}else{
			$resData = $this->userModel->deleteById($id);
		redisDelservice($data_request);
		if($resData){
		
			$ojb =ojbResponse(true,"delete user success");
			response($ojb);
			
		 }else{
			$ojb =ojbResponse(false,"delete user do not  success");
			response($ojb);
		 }	
			}
			
		
		}	
}catch(Exception $err){
	$ojb =ojbResponse(false,$err->getMessage());
	response($ojb);

	
}
	}

	public function updateUserById(){
		$data_request = $_POST;
		try{
				extract($data_request);
				$user = $this->userModel->getById($id);
				if(!$user){
					$ojb =ojbResponse(true,"delete userdo not  success");
					response($ojb);	
				}else{
		if(isset($_POST)){
            $res =   validateUser($data_request);
            if(!$res->success){
                response($res);
            }else{
           $ojb =array('username'=>$username,'email'=>$email,'phone'=>$phone,'date'=>$date,'password'=>$password);
          $resData = $this->userModel->updateById($id,$ojb);
		  redisSetService($ojb);
		  if($resData){
			$ojb =ojbResponse(true,"update  user success");
			response($ojb);
			
		 }else{
			$ojb =ojbResponse(false,"update do not user success");
			response($ojb);
		 }
            }
	
		}
	}
		}catch(Exception $err){
			$ojb =ojbResponse(false,$err->getMessage());
			response($ojb);
		
			
		}
	
		
		



	}

}