<?php

class search extends controller
{
    public function index()
    {
        
        $this->template='search';
        
        $this->document->addScript('views/scripts/search.js');
        
        $this->children=array('common/header','common/footer');
        
        $this->load->model('user');
        
        $result= $this->model_user->finduser();
        
        $this->data['search_results']=$result;
        
        $this->render();
        echo $this->output;
    }
    
  
}
