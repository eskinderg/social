<?php

class ajaxgetfriends extends controller
{
  
   public function index()
   {    
       header('Content-Type: application/json');
   }

   public function search($text)
   {
       /*        
        "SELECT user.* FROM user 
        RIGHT JOIN userrelationship 
        ON user.UserId=userrelationship.RelatingUserId 
        WHERE userrelationship.UserId=".$userid."");
*/
       
      $ID =  $this->user->getId();
      
        $query_result = $this->db->query(
                    "SELECT user.* FROM user "
                   ."RIGHT JOIN userrelationship "
                   ."ON user.UserId=userrelationship.RelatingUserId "
                   ."WHERE userrelationship.UserId=".$ID." AND user.firstname LIKE '%$text%'"
                 
                );
        
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
   
