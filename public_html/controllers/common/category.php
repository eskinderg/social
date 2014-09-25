<?php

class category extends controller{
    public function index()
    {
        $this->data['categories']= array('Nike','Addidas','Pepsi','Reebook');
        
        $this->template = 'common/category';
        
        $this->render();
        
    }
}
