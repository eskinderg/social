<?php

    class settings extends controller
    {
        public function index()
        {
            if($this->user->isLogged())
            {
                $this->template = 'settings';
                $this->children=array('common/header','common/footer') ;  
                
                $this->document->addScript('https://maps.googleapis.com/maps/api/js?sensor=false');
                
                $this->document->addScript('views/scripts/maps.js');
                
                $this->render();
                echo $this->output;
            }
            else
            {
                $this->redirect('register');
            }
        }
    }
