<?php

class photo extends controller
{
    
    public function index()
    {
        if(!$this->user->isLogged())
            $this->redirect ('register');
               
        $this->template = 'photo';
        $this->children = array('common/header','common/footer');
        
        $this->document->addStyle('views/stylesheets/photo.css');
        $this->document->addScript('views/scripts/photo.js');
        
        $query = $this->db->query("SELECT * FROM picture WHERE userid= ".$this->user->getId()." ");
        
        $this->data['images']= $query->rows;
        
                
                /*= array(
            array('Title'=>'Image1','path'=>'../image/profile.png'),
            array('Title'=>'Image2','path'=>'../image/profile.png'),
            array('Title'=>'Image3','path'=>'../image/profile.png'),
            array('Title'=>'Image4','path'=>'../image/profile.png'),
            array('Title'=>'Image5','path'=>'../image/profile.png'),
            array('Title'=>'Image6','path'=>'../image/profile.png')
            );
        */
        
        
        $this->render();
        echo $this->output;
    }
}
