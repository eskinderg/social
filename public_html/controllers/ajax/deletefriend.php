<?php
class deletefriend extends controller
{
    public function index()
    {
        
    }
    
    
    public function delete ($friendid)
    {
       if($this->db->query("DELETE FROM userrelationship WHERE UserId='" . $this->user->getId() ."' AND RelatingUserId = '".$friendid ."' "))
       {
           echo 'success';
       }
    }
    
    
}
