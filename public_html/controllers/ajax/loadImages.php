<?php
class loadImages extends controller{
    
    public function index()
   {    
       header('Content-Type: application/json');
       
       $query_result = $this->db->query("SELECT * FROM picture WHERE userid= ".$this->user->getId()." ");
        
        
        $this->data['images']= $query_result->rows;
        
        $json = array();
        
        
        foreach($query_result->rows as $result)
        {     
            if($this->userphoto->IsLiked($result['pictureid']))
                $btnclass= "likedbtn";
            if(!$this->userphoto->IsLiked($result['pictureid']))
                $btnclass= "likebtn";
            
            
            $json[]=  array('filepath'=> $result['filepath'],
                            'pictureid'=> $result['pictureid'],
                            'description'=>$result['description'],
                            'btnclass'=>$btnclass
                );
        }
        
       echo json_encode($json);
   }
   
}