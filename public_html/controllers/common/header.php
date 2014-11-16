<?php

class header extends controller{
    public function index()
    {
        
        //$this->documnet->setTitle('Home');
        
        $this->data['header_title']='Social Web';
        $this->document->addScript(HTTP_SERVER .'views/scripts/main.js');
        
        $this->data['scripts'] = $this->document->getScripts();
        $this->data['styles'] = $this->document->getStyles();
        $this->data['base'] = HTTPS_SERVER;
        $this->template = 'common/header';
       
         
        if($this->user->isLogged())
        {
            $this->children=array('common/dash'); // Include Dashboard Menu Items
             
            $this->data['menus']= array('Home' => 'home','Dashboard'=>'dashboard',
             'My Docs' => 'docs','Help'=>'help');
            
            $this->data['logout_text']= "<a href=' ".HTTP_SERVER."logout'><img alt = 'Logout' src='../views/image/logout-icon.png'></a>";
            
        }else
        {
             $this->data['menus']= array('Home' => 'home','Help'=>'help');
           
        }

        $this->render();
        
    }
}
