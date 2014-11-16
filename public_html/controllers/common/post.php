<?php

class post extends controller
{
    
    public function index()
    {
        
        
        $postdata= array('post1'=>array('username'=>'User1','post'=>'Post1'),
            'post2'=>array('username'=>'Usre2','post'=>'Post2'),
            'post3'=>array('username'=>'User3','post'=>'Post3'));
        
        
        $this->data['postdata']= $postdata;
        
        $this->template='common/post';
        $this->render();
        
    }
}
