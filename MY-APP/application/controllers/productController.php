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
	public function viewProduct()
	{
$this->load->model('productModel');
$data['info']= $this->productModel->getProduct()->result_array();

		$this->load->view('admin/product/displayProduct.php',$data);
	}
	public function addProduct(){
       $this->load->view('admin/product/addProduct.php');
	   $name = $this->input->post('name');
	   $category = $this->input->post('cg');
	   $count = $this->input->post('cis');
	   $price = $this->input->post('pc');
	   $img = $this->input->post('img');
	   if(isset($_POST['add'])){
		    if(!$name&&!$category&&!$count&&!$price&&!$img){
		   $message = "missing informaytion";
		   echo "<script type ='text/JavaScript'>";  
		   echo "alert('$message')";  
		   echo "</script>";
		   return;
	   }else{
		   $ojb =array('name'=>$name,'category'=>$category,'countInStock'=>$count,'price'=>$price,'image'=>$img);
	      $this->load->model('productModel');
	   $this->productModel->addProduct($ojb);
	   }
	   }
	  
	  
    }
	public function updateProduct($id){
		$this->load->model('productModel');
		$data['info'] = $this->productModel->getById($id)->result_array();
		$this->load->view('admin/product/updateProduct.php',$data);



	}
	public function delateProduct($id){
		$this->load->model('productModel');
		$this->productModel->deleteById($id);

	}
	public function updateProductById(){
	$id = $this->input->post('id');
		$name = $this->input->post('name');
		$category = $this->input->post('cg');
		$count = $this->input->post('cis');
		$price = $this->input->post('pc');
		$img = $this->input->post('img');
		if(isset($_POST['update'])){
			if(!$name&&!$category&&!$count&&!$price&&!$img){
			$message = "missing informaytion";
			echo "<script type ='text/JavaScript'>";  
			echo "alert('$message')";  
			echo "</script>";
			return;
		}else{
			$ojb =array('name'=>$name,'category'=>$category,'countInStock'=>$count,'price'=>$price,'image'=>$img);
		   $this->load->model('productModel');
		   $this->productModel->updateById($id,$ojb);

		}
		}
		
		



	}

}