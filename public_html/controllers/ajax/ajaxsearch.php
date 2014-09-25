<?php

class ajaxsearch extends controller
{
  
   public function index()
   {    
       header('Content-Type: application/json');
   }

   public function search($text)
   {
               
        
        
      
        $query_result = $this->db->query("SELECT * FROM user WHERE firstname LIKE '%".$text."%' or "
                . "lastname LIKE '%".$text."%'");
        $json = array();
        
        
        foreach($query_result->rows as $result)
        {
            $json[]=  array('username'=> $result['username'],
                'firstname'=>$result['firstname'],
                'lastname'=>$result['lastname'],
                'email'=>$result['email'],
                'profilepicture'=>$result['profilepicture'],
                );
        }
        
      
       echo json_encode($json);
  
   }
}
   
   ?>