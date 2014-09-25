<?php

class userprofile
{
    private $profile_id;
    private $user_id;
    private $pictureid;
    private $sex;
    


    public function __construct($registry) {
                $this->config = $registry->get('config');
		$this->db = $registry->get('db');
		$this->request = $registry->get('request');
                $this->user = $registry->get('user');
                $this->user_id = $this->user->getId();
                
                $result = $this->db->query("SELECT * FROM profile WHERE userid='" . $this->user_id."'");
                
                if($result->num_rows)
                {
                    $this->profile_id = $result->row['profileid'];
                    /*
                     * $this->profilename = blabla
                     * 
                     * 
                     * 
                     */
                }
                
                
                
                if ($this->user->isLogged())
                {
                    //echo 'True that';
                }
    }
    
    public function get_profileid()
    {
        return $this->profile_id;
    }
    
    public function get_pictureid()
    {
        return $this->pictureid;
    }
    
    public function get_profile_picture()
    {
        
    }
    
    
    public function get_sex()
    {
        return $this->sex;
    }

}