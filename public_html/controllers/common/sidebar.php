<?php

class sidebar extends controller
{
    public function index()
    {
       
        $this->template='common/sidebar';
        $this->load->model('user');
        $this->data['users']= $this->model_user->get_recent_users(100);
        $this->render();
    }
    
    
}