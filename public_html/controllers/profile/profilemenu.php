<?php

class profilemenu extends controller
{
    public function index()
    {
        $this->template = 'profile/profilemenu';
        
         $this->data['profile_menu'] = array('Profile'=>'profile',
                                              'Settings'=>'settings',
                                              'Message'=>'message'
                                                );
         
          
        
          
         $this->render();
    }
}