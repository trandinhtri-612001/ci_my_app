<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userController extends CI_Controller {

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
	public function viewUser()
	{
$this->load->model('userModel');
$data['info']= $this->userModel->getuser()->result_array();

		$this->load->view('admin/user/index.php',$data);
	}
	public function addUser(){
       $this->load->view('admin/user/addUser.php');
	   $username = $this->input->post('username');
	   $email = $this->input->post('email');
	   $phone = $this->input->post('phone');
	   $date = $this->input->post('date');
	   $password = $this->input->post('password');
       $ojb = new stdClass;
       $ojb->username = $username;
       $ojb->email = $email;
       $ojb->phone = $phone;
       $ojb->date = $date;
       $ojb->password = $password;
	   if(isset($_POST['add'])){

           $this->load->helper('user_helper');
        $res =   validateUser($ojb);
        if(!$res->success){
            echo "<script type ='text/JavaScript'>";  
	    echo "alert(' $res->messages')";  
	  echo "</script>";
      return;
        }else{
	   $ojb =array('username'=>$username,'email'=>$email,'phone'=>$phone,'date'=>$date,'password'=>$password);
	       $this->load->model('userModel');
	  $this->userModel->addUser($ojb);
        }
  

	   }
	  
	  
    }
	public function updateUser($id){
		$this->load->model('userModel');
		$data['info'] = $this->userModel->getById($id)->result_array();
		$this->load->view('admin/user/updateUser.php',$data);



	}
	public function delateUser($id){
		$this->load->model('userModel');
		$this->userModel->deleteById($id);

	}

	public function updateUserById(){
	$id = $this->input->post('id');
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $phone = $this->input->post('phone');
    $date = $this->input->post('date');
    $password = $this->input->post('password');
    $ojb = new stdClass;
    $ojb->username = $username;
    $ojb->email = $email;
    $ojb->phone = $phone;
    $ojb->date = $date;
    $ojb->password = $password;
		if(isset($_POST['update'])){
            $this->load->helper('user_helper');
            $res =   validateUser($ojb);
            if(!$res->success){
                echo "<script type ='text/JavaScript'>";  
            echo "alert(' $res->messages')";  
          echo "</script>";
          
            }else{
           $ojb =array('username'=>$username,'email'=>$email,'phone'=>$phone,'date'=>$date,'password'=>$password);
           
           $this->load->model('userModel');
          $this->userModel->updateById($id,$ojb);
            }
	
		}
		
		



	}

}