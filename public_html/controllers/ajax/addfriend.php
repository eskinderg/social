<?php

class addfriend extends controller
{
  
   public function index()
   {

   }

   public function add($friendid)
   {
       
        $query_result = $this->db->query("SELECT * FROM userrelationship WHERE UserId='" . $this->user->getId() ."' AND RelatingUserId = '".$friendid ."' ");

        if($query_result->num_rows) // if not in the user's friends list then add as friend
        {
           echo 'exists';
        }else
        {

              $this->db->query("INSERT INTO userrelationship"
                . " (UserId,RelatingUserId,type) "
                . "VALUES "
                . "('". (int) $this->user->getId() ."','". (int)$friendid. "','friends')");
           
            echo 'success';
        }
   }
   
   public function dell()
   {
       echo 'called';
   }
   
   public function upload_image($filename)
   {
       
   }
   
   }
   
   ?>