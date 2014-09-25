<?php

    class home extends controller {
        
       public function index()
        {
           
           if(!$this->user->isLogged())
           {
               $this->redirect('register');
               exit();
               
           }else
           {
               //$this->redirect('dashboard');
           }
           
           
           
            $this->template='home';
            $this->children = array('common/header','common/footer','common/post','common/recentusers');
           $this->document->addStyle('views/stylesheets/common/post.css');
            
            
            $this->render();
            echo $this->output;
           
           
           
            //$this->response->setOutput($this->render());
            
        }
    }
