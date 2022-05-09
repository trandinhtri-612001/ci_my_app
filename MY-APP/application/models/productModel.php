<?php
class productModel extends CI_Model
{
    public function addproduct($data)
    {
  $this->db->insert('product',$data);
  redirect('productController/viewProduct','refresh');
        
    }
    public function getProduct(){
        $res = $this->db->get('product');
        return  $res;
    }
    public function deleteById($id){
        $this->db->where('id',$id);
        $this->db->delete("product");
        redirect('productController/viewProduct','refresh');
    }
    public function getById($id){
        $this->db->where('id',$id);
        $res = $this->db->get('product');
        return $res;
    }
    public function updateById($id,$data){
        $this->db->where('id',$id);
       $this->db->update('product',$data);
        redirect('productController/viewProduct','refresh');
    }
}




?>