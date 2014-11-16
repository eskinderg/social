<?php
class pictureview extends controller{
    
    public function index()
   {    
       header('Content-Type: application/json');
       
   }
   public function load($pictureid)
   {
       $query_result = $this->db->query("SELECT * FROM picture WHERE pictureid= ".$pictureid." ");

        $btnclass;
        
        
        
        if($this->userphoto->IsLiked($pictureid))
        {
            $btnclass="likedbtn";
        }
        
        $json = array();

        $json[] = array('filepath'=> $query_result->row['filepath'],'btnclass'=>$btnclass,'pictureid'=>$pictureid);
        //var_dump($query_result->row[0]);
        //$json[]=array('filepath'=>22);
       echo json_encode($json);
       
   }

}