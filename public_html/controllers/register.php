<?php

class register extends controller {
    private $error = array();
    
    public function index()
    {
        $this->document->addScript('views/scripts/register.js');
        
        if($this->user->isLogged())   
        {
            $this->redirect('dashboard');
                        
        }
        $this->data['action']= 'register';
        //$this->model_user->addCustomer($_POST);
        
        if($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate())
        {
            $this->load->model('register');
            
            /*--------------------------------------------------------------------------------
            
            if($this->model_register->is_registered($this->request->post))
            {
                $this->error['register_username_error']='Username already exists'; 
                
            }
            ----------------------------------------------------------------------------------*/
            
            $this->model_register->adduser($this->request->post);
            
            
            
            if($this->user->login($this->request->post['username'],
                   $this->request->post['password'],TRUE))
           {
              
               $this->redirect('dashboard');
               
               
           }
            
            $this->redirect('dashboard');
        }
        
        
        if(isset($this->request->post['username']))
        {
            $this->data['username'] = $this->request->post['username'];
        }  else {
             $this->data['username'] ='';
        }
        
                
        if(isset($this->request->post['email']))
        {
            $this->data['email'] = $this->request->post['email'];
        }  else {
             $this->data['email'] ='';
        }
        
                
        if(isset($this->request->post['firstname']))
        {
            $this->data['firstname'] = $this->request->post['firstname'];
        }  else {
             $this->data['firstname'] ='';
        }
        
        
        
        
        
        $this->template='register';
        $this->children = array('common/header','common/footer',);
          
        
        
        $this->render();
        echo $this->output;
        
    }
    
    




    private function validate()
    {
        
        if(strlen($this->request->post['username']) <= 0)
        {
            $this->data['register_username_error']='invalid username';
            $this->error['register_username_error']='invalid username';
            
        }
        
        if(strlen($this->request->post['email']) <= 0)
        {
            $this->data['register_email_error']='invalid email address';
            $this->error['register_email_error']='invalid email address';
        }
        
        if(!$this->error)
        { return TRUE;}
        else
        { return false;}
       
    }
    

    
}
