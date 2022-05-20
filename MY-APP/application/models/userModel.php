
   
<?php
class userModel extends CI_Model
{
    function __construct() {
		parent::__construct();
		
	}
    
    public function addUser($data)
    {
      $resData =  $this->db->insert('users',$data);
      return $resData;
    }
    public function getuser(){
        $resData = $this->db->get('users');
        return  $resData;
    }
    public function deleteById($id){
        $this->db->where('id',$id);
        $resData = $this->db->delete("users");
        return $resData;

       
    }
    public function getById($id){
        $this->db->where('id',$id);
        $resData = $this->db->get('users');
        return $resData;
    }
    public function updateById($id,$data){
        $this->db->where('id',$id);
      $resData =  $this->db->update('users',$data);
      return $resData;
    }
}




?>
