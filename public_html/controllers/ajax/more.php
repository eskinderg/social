<?php

class more extends controller{
    
    public function index()
   {    
       header('Content-Type: application/json');
   }

   public function loadmore($start)
   {
      
      
        $query_result = $this->db->query("SELECT * FROM user LIMIT $start ,21");
        $json = array();
        
        
        
        foreach($query_result->rows as $result)
        {
            
            if($this->user->isFriendsWith($result['UserId']))
                $txt_button ='Unfriend';
            else
                $txt_button = "Add Friend";
                
            
            $json[]=  array('username'=> $result['username'],
                            'UserId' => $result['UserId'],
                            'firstname'=>$result['firstname'],
                            'lastname'=>$result['lastname'],
                            'email'=>$result['email'],
                            'profilepicture'=>$result['profilepicture'],
                            'txt_button'=>$txt_button
                );
        }
        
      
       echo json_encode($json);
  
   }
}
