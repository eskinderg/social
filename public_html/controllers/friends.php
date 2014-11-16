<?php
class friends extends controller
{
    public function index()
    {
        
       if(!$this->user->isLogged())
         $this->redirect ('register');
           
        $this->document->addScript('views/scripts/friends.js');
        
        $this->template = 'friends';
        
        $this->children = array('common/header','common/footer','common/panelleft');
       
        $this->load->model('user');
        $friendslist = $this->model_user->getFriendsList($this->user->getId());
        
        
        $this->data['profile_pic']=  "../image/default-avatar-small.png";
        
         foreach ($friendslist as $key => $value) {
            if(!$friendslist[$key]['profilepicture'])
            {
               $friendslist[$key]['profilepicture']="../image/default-avatar-small.png";
            }
            
            if($this->user->isFriendsWith($friendslist[$key]['UserId']))
            {
                $friendslist[$key]['txt_button'] = 'Unfriend';
            }
            else
            {
                $friendslist[$key]['txt_button'] = 'Add Friend';
            }
        }   
       
        
         $this->data['friends']=$friendslist;

        $this->render();
        echo $this->output;
    }
}


