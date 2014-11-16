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
       $jsonStatus = array();
       $filepath ="";
        
                 
         $result = $this->db->query("SELECT * FROM picture WHERE userid='" . $this->user->getId() ."' AND pictureid = '".$photoid ."' ");
                    
        if($result->num_rows)
        {  
            $filepath = $result->row['filepath'];
            $filearray = explode('/',$filepath); // extracting filename
            $filename = $filearray[3];
            
            //move file to the delete folder
            rename('image/uploads/photos/' . $filename, 'image/uploads/photos/deleted/' . $filename);
            
            $this->db->query("DELETE FROM picture WHERE UserId='" . $this->user->getId() ."' AND pictureid = '".$photoid ."' ");
            $this->db->query("DELETE FROM photolikes WHERE userid='" . $this->user->getId() ."' AND pictureid = '".$photoid ."' ");
            
            $jsonStatus[]=  $filearray ;// array('deleted'=>"yes",'pictureid'=>23,'filepath'=>$filepath);
            
        }
        
        
      echo json_encode($jsonStatus);
   }
   
}