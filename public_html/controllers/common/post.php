<?php

class post extends controller
{
    
    public function index()
    {
        
        
        $postdata= array('post1'=>array('username'=>'User1','post'=>'I am feeling tired'),
            'post2'=>array('username'=>'Usre2','post'=>'I am feeling string'),
            'post3'=>array('username'=>'User3','post'=>'Where am I'));
        
        
        $this->data['postdata']= $postdata;
        
        $this->template='common/post';
        $this->render();
        
    }
}
