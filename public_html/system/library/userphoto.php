<?php
class userphoto {
	private $config;
	private $db;
	private $data = array();
	

  	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->user = $registry->get('user');
		$this->session = $registry->get('session');
		$this->db = $registry->get('db');
		//if (!isset($this->session->data['cart']) || !is_array($this->session->data['cart'])) {
      		//$this->session->data['photo'] = array();
    	}

        
        public function IsLiked($photoid)
        {
            $query_result = $this->db->query("SELECT * FROM photolikes WHERE userid= ".$this->user->getId()." AND pictureid=".$photoid." ");

            if($query_result->num_rows)
                return true;
            else
                return false;
        }
        
        public function deletePhoto($photoid)
        {
          
          
          if($this->user->isLogged())
            {
               if($this->userphoto->IsLiked($photoid))
               {          
                   $this->db->query("DELETE FROM photolikes WHERE userid='" . $this->user->getId() ."' AND pictureid = '".$photoid ."' ");
                 
               }
            }
        }
}	
?>