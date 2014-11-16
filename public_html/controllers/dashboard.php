<?php

class dashboard extends controller {
    public $startitems;
    public $enditems;
    
    function __construct($registry = NULL) {
        parent::__construct($registry);
        $this->startitems =0;
        $this->startitems =12;
    }
    
    
    public function index()
    {
        
        
        if(!$this->user->isLogged())
        {
            $this->redirect('login');
            
        }
        
        $this->document->addScript("../views/scripts/dashboard.js");
        $this->document->addStyle("../views/stylesheets/dashboard.css");
        
        $this->data['firstname']= $this->user->getFirstname();
        //$this->data['href']= HTTPS_SERVER . 'profilepage/' . $this->user->get_username(); 
       
       
        
        $this->template= 'dashboard';
        $this->children= array ('common/header','common/footer','common/sidebar');

        
        $this->load->model('user');
        
       $users= $this->model_user->getlimitedusers(0,21);
        
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
