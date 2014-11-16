<?php
class user {
	private $user_id;
        private $profile_id;
        private $username;
	private $firstname;
	private $lastname;
	private $email;
	private $telephone;
	private $fax;
	private $newsletter;
	private $customer_group_id;
	private $address_id;
        private $about;
	private $datejoined;
        private $profilepicture;
        
        private $occupation;
        private $height;
        private $hobby;
        private $address;
        
        
        
  	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->db = $registry->get('db');
		$this->request = $registry->get('request');
		$this->session = $registry->get('session');
				
		if (isset($this->session->data['user_id'])) { 
		
                    $query_result = $this->db->query("SELECT * FROM user WHERE UserId='" . $this->session->data['user_id']."'");
                    
                    if ($query_result->num_rows) {
				$this->user_id = $query_result->row['UserId'];
                                $this->username = $query_result->row['username'];
				$this->firstname = $query_result->row['firstname'];
				$this->lastname = $query_result->row['lastname'];
				$this->email = $query_result->row['email'];
				$this->telephone = $query_result->row['telephone'];
				$this->fax = $query_result->row['fax'];
				$this->newsletter = $query_result->row['newsletter'];
				$this->customer_group_id = $query_result->row['customer_group_id'];
				$this->address_id = $query_result->row['address_id'];
				$this->about = $query_result->row['about'];
                                $this->datejoined= $query_result->row['time'];
                                $this->profilepicture = $query_result->row['profilepicture'];
                                
                                $this->address = $query_result->row['address'];
                                $this->occupation= $query_result->row['occupation'];
                                $this->hobby = $query_result->row['hobby'];
                                $this->height= $query_result->row['height'];
                        
                                
      			//$this->db->query("UPDATE customer SET cart = '" . $this->db->escape(isset($this->session->data['cart']) ? serialize($this->session->data['cart']) : '') . "', wishlist = '" . $this->db->escape(isset($this->session->data['wishlist']) ? serialize($this->session->data['wishlist']) : '') . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "' WHERE user_id = '" . (int)$this->user_id . "'");
			
			//	$query = $this->db->query("SELECT * FROM customer_ip WHERE user_id = '" . (int)$this->session->data['user_id'] . "' AND ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'");
				
				if (!$query->num_rows) {
					//$this->db->query("INSERT INTO customer_ip SET user_id = '" . (int)$this->session->data['user_id'] . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', date_added = NOW()");
				}
			} else {
				$this->logout();
			}
  		}
	}
		
  	public function login($username, $password, $override = false) {
		if ($override) {
                    //echo $email;
			$query_result = $this->db->query("SELECT * FROM user WHERE username='" . $username."'");
		} else {
			//$query_result = $this->db->query("SELECT * FROM user WHERE LOWER(email) = '" . $this->db->escape(utf8_strtolower($email)) . "' AND (password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1('" . $this->db->escape($password) . "'))))) OR password = '" . $this->db->escape(md5($password)) . "') AND status = '1' AND approved = '1'");
		}
		
		if ($query_result->num_rows) {
			
                        $this->session->data['user_id'] = $query_result->row['UserId'];						
			$this->user_id = $query_result->row['UserId'];
                        $this->username = $query_result->row['username'];
			$this->firstname = $query_result->row['firstname'];
			$this->lastname = $query_result->row['lastname'];
			$this->email = $query_result->row['email'];
			$this->telephone = $query_result->row['telephone'];
			$this->fax = $query_result->row['fax'];
			$this->newsletter = $query_result->row['newsletter'];
			$this->customer_group_id = $query_result->row['customer_group_id'];
			$this->address_id = $query_result->row['address_id'];
                        $this->profile_id = $query_result->row['profileid'];
                        $this->about = $query_result->row['about'];
                        $this->profilepicture = $query_result->row['profilepicture'];
                        
                        $this->address = $query_result->row['address'];
                        $this->occupation= $query_result->row['occupation'];
                        $this->hobby = $query_result->row['hobby'];
                        $this->height= $query_result->row['height'];
                        
			//$this->db->query("UPDATE customer SET ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "' WHERE user_id = '" . (int)$this->user_id . "'");
			
	  		return true;
    	} else {
      		return false;
    	}
  	}
  	
	public function logout() {
		//$this->db->query("UPDATE customer SET cart = '" . $this->db->escape(isset($this->session->data['cart']) ? serialize($this->session->data['cart']) : '') . "', wishlist = '" . $this->db->escape(isset($this->session->data['wishlist']) ? serialize($this->session->data['wishlist']) : '') . "' WHERE user_id = '" . (int)$this->user_id . "'");
		
		unset($this->session->data['user_id']);

		$this->user_id = '';
		$this->firstname = '';
		$this->lastname = '';
		$this->email = '';
		$this->telephone = '';
		$this->fax = '';
		$this->newsletter = '';
		$this->customer_group_id = '';
		$this->address_id = '';
                $this->about = '';
  	}
        
        public function has_profile()
        {
            return $this->profile_id;
        }
        
        
        
        
  	public function isLogged() {
    	return $this->user_id;
  	}

  	public function getId() {
    	return $this->user_id;
  	}
        
        public function getprofileid()
        {
            return $this->profile_id;
        }
  	public function getFirstName() {
		return $this->firstname;
  	}
  
  	public function getLastName() {
		return $this->lastname;
  	}
        public function get_username()
        {
            return $this->username;
        }


        public function getEmail() {
		return $this->email;
  	}
  
  	public function getTelephone() {
		return $this->telephone;
  	}
	
  	public function getNewsletter() {
		return $this->newsletter;	
  	}

  	public function getCustomerGroupId() {
		return $this->customer_group_id;	
  	}
	
  	public function getAddressId() {
		return $this->address_id;	
  	}
        
        public function getAbout()
        {
            return $this->about;
        }
        
        public function datejoined()
        {
            return $this->datejoined;
        }
        
        public function profilepicture()
        {
            return $this->profilepicture;
        }

        public function getOccupation()
        {
            return $this->occupation;
        }
        
        public function getAddress()
        {
            return $this->address;
        }
        
        public function getHobby()
        {
            return $this->hobby;
        }
        
        public function getHeight()
        {
            return $this->height;
        }




        public function addFriend($friendid)
        {
            
        }
        
        public function isFriendsWith($friendid)
        {
            $query_result = $this->db->query("SELECT * FROM userrelationship WHERE UserId='" . $this->user_id ."' AND RelatingUserId='". $friendid."'");
        
                if($query_result->num_rows) // if not in the user's friends list then add as friend
                {
                   return TRUE;
                }else
                {
                    return false;
                }
        }
}
?>