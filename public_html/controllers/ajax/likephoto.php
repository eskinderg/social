<?php
class likephoto extends controller{
    

    public function index()
   {    
       header('Content-Type: application/json');
   }
   
   
   public function like($photoid)
   {
       $jsonStatus = array();
       
       if($this->userphoto->IsLiked($photoid))
       {          
           $this->db->query("DELETE FROM photolikes WHERE userid='" . $this->user->getId() ."' AND pictureid = '".$photoid ."' ");
           $jsonStatus[]=  array('status'=>"unliked",'pictureid',$photoid);
       }
       else
       {
            $query_result = $this->db->query("INSERT INTO photolikes ".
                                        "(userid,pictureid)".                     
                                        "VALUES('".$this->user->getId()."','".(int)$photoid."');");
            $jsonStatus[]=  array('status'=>"liked",'pictureid'=>$photoid);
       }
       
      echo json_encode($jsonStatus);
   }
   
   public function deletePhoto($photoid)
   {

   }
   
}