<?php

class recentusers extends controller {

    public function index()
            
    {
        $this->template= 'common/recent_users';
        
        $this->load->model('user');
        $users= $this->model_user->get_recent_users(10);

        foreach ($users as $key => $value) {

             if(!$users[$key]['profilepicture'])
             {
                $users[$key]['profilepicture']="../image/default-avatar-small.png";
             }

            if($this->user->isFriendsWith($users[$key]['UserId']))
            {
                $users[$key]['txt_button'] = 'Unfriend';
            }
            else
            {
                $users[$key]['txt_button'] = 'Add Friend';
            }
        }   
       
       
       $this->data['users'] = $users;
       
       
  
       /*
        print "<pre>";
        print_r($this->data);
        print "</pre>";
        
        */
  
        $this->render();
       
    }
}
