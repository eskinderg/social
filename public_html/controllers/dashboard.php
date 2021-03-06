<?php

class dashboard extends controller {
    
    public function index()
    {
        
        
        if(!$this->user->isLogged())
        {
            $this->redirect('login');
            
        }
        
        $this->data['firstname']= $this->user->getFirstname();
        //$this->data['href']= HTTPS_SERVER . 'profilepage/' . $this->user->get_username(); 
       
       
        
        $this->template= 'dashboard';
        $this->children= array ('common/header','common/footer','common/sidebar');

        
        $this->load->model('user');
        
       $users= $this->model_user->getusers();
        
      // var_dump($users->row);
       
       
     foreach ($users as $key => $value) {
         
         
        if(!$users[$key]['profilepicture'])
        {
           $users[$key]['profilepicture']="../image/default-avatar-small.png";
        }
            
        if($this->user->isFriendsWith($users[$key]['UserId']))
        {
            $users[$key]['txt_button'] = 'Unfriend';
        }
        else
        {
            $users[$key]['txt_button'] = 'Add Friend';
        }
    }   
       
       
       $this->data['users'] = $users;
       
       
       /*
        print "<pre>";
        print_r($this->data);
        print "</pre>";
        
        */
  
        $this->render();
        echo $this->output;
    }
    
}
