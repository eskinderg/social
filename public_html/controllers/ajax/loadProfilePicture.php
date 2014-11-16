<?php
class loadProfilePicture extends controller{
    
    public function index()
   {    
       header('Content-Type: application/json');
       
       $query_result = $this->db->query("SELECT * FROM user WHERE userid= ".$this->user->getId()." ");
        
        
        $image= $query_result->row["profilepicture"];
        
        $json = array();
        
   
            
            $json[]=  array('profilePicture'=> $image);
        
            
       echo json_encode($json);
   }

}