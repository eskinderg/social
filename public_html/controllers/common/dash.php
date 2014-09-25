<?php

class dash extends controller {
    
    public function index()
    {
        
        $this->data['search_script']='views/scripts/search.js';
        
        if(!$this->user->isLogged())
        {
            //$this->redirect('login');
            
        }
        
        //$this->data['user_name']= $this->user->get_username();
        $this->data['dashboard_menu'] = array('Profile'=>HTTP_SERVER . 'profile',
                                              'Settings'=>HTTP_SERVER .'settings',
                                              'Message'=>HTTP_SERVER . 'message',
                                               'Photo'=>HTTP_SERVER . 'photo',
                                                'Friends' => HTTP_SERVER .'friends');
        
        $this->template= 'common/dash';
        

        
        $this->render();
        
    }
    
}
