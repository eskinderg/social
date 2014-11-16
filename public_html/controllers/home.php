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
            $this->document->addStyle('views/stylesheets/common/post.css');
            $this->document->addScript('views/scripts/post.js');
            $this->children = array('common/header','common/footer','common/post','common/recentusers');
           
            
            
            $this->render();
            echo $this->output;
           
           
           
            //$this->response->setOutput($this->render());
            
        }
    }
