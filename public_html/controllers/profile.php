<?php

class profile extends controller
{
    
     public function index()
     {
         
           if(!$this->user->isLogged())
          {
              $this->redirect('login');
          }

         $this->document->addScript('views/scripts/profile.js');
         $this->document->addScript('views/scripts/jquery-ui/jquery-ui-1.10.4.custom.js');
         $this->document->addScript('views/scripts/jquery-ui/jquery-ui-1.10.4.custom.min.js');
         
         $this->document->addStyle('views/stylesheets/profile.css');
         $this->document->addStyle('views/stylesheets/jquery-ui/jquery-ui-1.10.4.custom.css');
         $this->document->addStyle('views/stylesheets/jquery-ui/jquery-ui-1.10.4.custom.min.css');

         
        $this->template = 'profile';
         
       /* $this->data['profile_menu'] = array('Profile'=>'profile',
                                              'Settings'=>'settings',
                                              'Message'=>'message');*/
        $this->data['action']='profile';
        
        
        
        if ($this->request->server['REQUEST_METHOD'] == 'POST')
        {
            $post_data= array(
                
                'firstname' =>$this->request->post['txt-profile-firstname'] ,
                'lastname'=>$this->request->post['txt-profile-lastname'],
                'email'=> $this->request->post['txt-profile-email'],
                'address'=> $this->request->post['txt-profile-address'],
                'occupation'=> $this->request->post['txt-profile-occupation'],
                'hobby'=> $this->request->post['txt-profile-hobby'],
                'height'=> $this->request->post['txt-profile-height']
                    
                );
           
            if ($this->validate($post_data) && $this->user->isLogged())
            {
                $this->load->model('user');
                $post_data['UserId'] = $this->user->getId();
                $this->model_user->updateuser($post_data);
                $this->redirect('profile'); //refresh the page after data update;
            }
        }
        
          
        $this->data['first_name']= $this->user->getFirstName();
        $this->data['last_name']= $this->user->getLastName();
        $this->data['email']= $this->user->getEmail();
        $this->data['sex']= $this->userprofile->get_sex();
        $this->data['about'] = $this->user->getAbout();
        
        $this->data['address'] = $this->user->getAddress();
        $this->data['occupation'] = $this->user->getOccupation();
        $this->data['height'] = $this->user->getHeight();
        $this->data['hobby'] = $this->user->getHobby();
        
        
         
              //$this->data['profile_picture']= $this->userprofile->get_profile_picture();
             
              
              if($this->user->profilepicture())
              {
                $this->data['profile_pic']= $this->user->profilepicture();// 
              }
              else
              {
                   $this->data['profile_pic']= "../image/default-avatar.png";
              }
              
              $this->children = array('common/header','common/footer');
         
            $this->render();
            
            echo $this->output;
          
 
         
     }
     
     
     
    private function validate($post)
     {
        
         $status= TRUE;
         
         if ($post['firstname']=='' || $post['lastname']=='' || $post['email'] =='')
         {
             $status = false;

         }
         return $status;
     }
}