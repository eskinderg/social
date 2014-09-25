<?php
class model_user extends Model

{
    
    public function addFriend($userid, $friendid)
    {
        $query_result = $this->db->query("SELECT * FROM userrelationship WHERE UserId='" .$userid."' AND RelatingUserId = '".$friendid ."' ");

        if($query_result->num_rows) // if not in the user's friends list then add as friend
        {
           return false;
        }else
        {

              $this->db->query("INSERT INTO userrelationship"
                . " (UserId,RelatingUserId,type) "
                . "VALUES "
                . "('". (int)$userid  ."','". (int)$friendid. "','friends')");
           
            return true;
        }

    }
    
    public function getFriendsList($userid)
    {
         $query_result = $this->db->query("SELECT user.* 
                                            FROM user 
                                            RIGHT JOIN userrelationship 
                                            ON user.UserId=userrelationship.RelatingUserId 
                                            WHERE userrelationship.UserId=".$userid."");
                 
         
         return $query_result->rows;
    }
    
    
    public function getusers()
    {
        $query = $this->db->query("SELECT * FROM user");
		
	return $query->rows;
    }
    
    public function updateuser($data = array())
    {
        if(isset($data))
        {
            extract($data);
            $this->db->query("UPDATE user
                             SET firstname='" .$firstname. "', lastname='". $lastname . "',email='" . $email ."'
                            WHERE UserId='" . $UserId . "';");
            
            
        }
    }
    
    public function get_recent_users($limit)
    {
                $query = $this->db->query("SELECT * "
                        . "FROM user"
                        . " LIMIT ". $limit);
		
	return $query->rows;
    }
    

    
    public function finduser()
    {
        //$query = $this->db->query("SELECT * "
          //              . "FROM user"
           //             . " LIMIT ". $limit);
        
    
        //return $query->rows;
    }
}
