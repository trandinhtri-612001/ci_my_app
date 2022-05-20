<?php
class productModel extends CI_Model
{
    function __construct() {
		parent::__construct();
		
	}
    public function addproduct($data)
    {
 $resData =  $this->db->insert('product',$data);
return $resData;
        
    }
    public function getProduct(){
        $res = $this->db->get('product');
        return  $res;
    }
    public function deleteById($id){
        $this->db->where('id',$id);
        $resData=  $this->db->delete("product");
        return $resData;
    }
    public function getById($id){
        $this->db->where('id',$id);
        $res = $this->db->get('product');
        return $res;
    }
    public function updateById($id,$data){
        $this->db->where('id',$id);
        $resData =  $this->db->update('product',$data);
        return $resData;
    }
}




?>