<?php

class dash extends controller {
    
    public function index()
    {
        
        $this->data['search_script']='views/scripts/search.js';
        $this->data['dash_script']='views/scripts/common/dash.js';
        if(!$this->user->isLogged())
        {
            //$this->redirect('login');
            
        }
        
            $this->data['popupmenu'] = array(
            array('Title'=>'Profile', 'link'=>HTTP_SERVER . 'profile','icon'=>'../image/profile.png'),
            array('Title'=>'Message','link'=>HTTP_SERVER . 'message','icon'=>'../image/mail-icon.png'),
            array('Title'=>'Photo','link'=>HTTP_SERVER . 'photo','icon'=>'../image/photo.png'),
            array('Title'=>'Friends','link' => HTTP_SERVER .'friends','icon'=>'../image/friends.png'),
            array('Title'=>'Support','link'=>HTTP_SERVER .'support','icon'=>'../image/settings.png'),
            array('Title'=>'Settings','link'=>HTTP_SERVER .'settings','icon'=>'../image/settings.png')
            );
        
       // $this->data['txtsearch'] = $this->request->post['txtsearch'];
        //var_dump($this->data['txtsearch']);
        //$this->data['user_name']= $this->user->get_username();
        $this->data['dashboard_menu'] = array(
            array('Title'=>'Settings','link'=>HTTP_SERVER .'settings','icon'=>'../image/settings.png'),
            array('Title'=>'Profile', 'link'=>HTTP_SERVER . 'profile','icon'=>'../image/profile.png'),
            array('Title'=>'Message','link'=>HTTP_SERVER . 'message','icon'=>'../image/mail-icon.png'),
            array('Title'=>'Photo','link'=>HTTP_SERVER . 'photo','icon'=>'../image/photo.png'),
            array('Title'=>'Friends','link' => HTTP_SERVER .'friends','icon'=>'../image/friends.png')
            
            );
        
        $this->template= 'common/dash';
        

        
        $this->render();
        
    }
    
}
