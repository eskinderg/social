<?php

class Error extends controller
{
    public function index()
    {
        
        
        $this->template='error';
        $this->data['error_message']= '404. Sorry, page not found';
       
        
        $this->children = array ('common/header','common/footer');
        $this->render();
        echo $this->output;
    }
    
}
