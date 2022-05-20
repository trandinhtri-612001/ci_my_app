<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productController extends CI_Controller {

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
		$this->load->model('productModel');
		$this->load->helper('product_helper');
		$this->load->helper('response_helper');
	}
	public function viewProduct()
	{
		try{
			if(isset($_GET)){
				$data['info']= $this->productModel->getProduct()->result_array();
				$this->load->view('admin/product/displayProduct.php',$data);
			}	
			}catch(Exception $err){
				$ojb =ojbResponse(false,$err->getMessage());
				response($ojb);
			   }

        
	}
	public function viewAddProduct(){
		try{
		if(isset($_GET)){
			 $this->load->view('admin/product/addProduct.php');
		}	
		}catch(Exception $err){
			$ojb =ojbResponse(false,$err->getMessage());
			response($ojb);
		   }
		
	}

	public function addProduct(){
	   $data_request = $_POST;
	   try{
		    if(isset($_POST)){
		  $res =  productValidate($data_request);
		    if(!$res->success){
		  response($res);
	   }else{
		extract($data_request);
	  $ojb =array('name'=>$name,'category'=>$category,'countInStock'=>$countInStock,'price'=>$price,'image'=>$image);
	   $resData = $this->productModel->addProduct($ojb);
	   if($resData){
		$ojb =ojbResponse(true,"add product success");
		response($ojb);
	 }else{
		$ojb =ojbResponse(false,"add product do not  success");
		response($ojb);
	 }
	  }
	   } 
	   }catch(Exception $err){
		$ojb =ojbResponse(false,$err->getMessage());
		response($ojb);
	   }
	 
	  
	  
    }
	public function updateProduct($id){		
		try{
			if(isset($_GET)){
				$data['info'] = $this->productModel->getById($id)->result_array();
				$this->load->view('admin/product/updateProduct.php',$data);	
			}	
			}catch(Exception $err){
				$ojb =ojbResponse(false,$err->getMessage());
				response($ojb);
			   }
	}

	public function deleteProduct(){
	
		try{
			if(isset($_POST)){
				extract($_POST);
				$resData = $this->productModel->deleteById($id);
				if($resData){
					$ojb =ojbResponse(true,"delete product success");
					response($ojb);
				 }else{
					$ojb =ojbResponse(false,"delete product do not  success");
					response($ojb);
				 }
			}
			}catch(Exception $err){
				$ojb =ojbResponse(false,$err->getMessage());
				response($ojb);
		
			   }

		
	}

	public function updateProductById(){
		$data_request = $_POST;
		
		try{
		if(isset($_POST)){
			extract($data_request);
			$res =  productValidate($data_request);
		    if(!$res->success){
				response($res);
			
		}else{
			$ojb =array('name'=>$name,'category'=>$category,'countInStock'=>$countInStock,'price'=>$price,'image'=>$image);
			
			$resData = $this->productModel->updateById($id,$ojb);
			if($resData){
				$ojb =ojbResponse(true,"update product success");
				response($ojb);
				
			 }else{
				$ojb =ojbResponse(false,"update product do not  success");
				response($ojb);
			 }

		}
		}
	}catch(Exception $err){
		$ojb =ojbResponse(false,$err->getMessage());
		response($ojb);

	   }


	}

}