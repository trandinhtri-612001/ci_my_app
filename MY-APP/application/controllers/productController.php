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
	}
	public function viewProduct()
	{

        $data['info']= $this->productModel->getProduct()->result_array();
		$this->load->view('admin/product/displayProduct.php',$data);
	}

	public function addProduct(){
       $this->load->view('admin/product/addProduct.php');
	   $data_request = $this->input->post();
	   extract($data_request);
	   if(isset($_POST['add'])){
		  $res =  productValidate($data_request);
		    if(!$res->success){
		   echo "<script type ='text/JavaScript'>";  
		   echo "alert('$res->messages')";  
		   echo "</script>";
	   }else{
		   $ojb =array('name'=>$name,'category'=>$category,'countInStock'=>$countInStock,'price'=>$price,'image'=>$image);
	   $this->productModel->addProduct($ojb);
	   }
	   }
	  
	  
    }
	public function updateProduct($id){		
		$data['info'] = $this->productModel->getById($id)->result_array();
		$this->load->view('admin/product/updateProduct.php',$data);
	}

	public function delateProduct($id){
		$this->productModel->deleteById($id);
	}

	public function updateProductById(){
		$data_request = $this->input->post();
		extract($data_request);
		if(isset($_POST['update'])){
			$res =  productValidate($data_request);
		    if(!$res->success){
			echo "<script type ='text/JavaScript'>";  
			echo "alert('$res->messages')";  
			echo "</script>";
			
		}else{
			$ojb =array('name'=>$name,'category'=>$category,'countInStock'=>$countInStock,'price'=>$price,'image'=>$image);
		   $this->productModel->updateById($id,$ojb);

		}
		}
		
		



	}

}