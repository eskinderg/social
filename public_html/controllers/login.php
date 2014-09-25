<?php
class login extends controller
{
    private $error = array();
    
   public function index()
    {
       if($this->user->isLogged())
       {
           $this->redirect('dashboard');
       }
       
       if($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate())
       {
            //$this->user->logout();
            
           //var_dump($this->request->post);
                    if($this->user->login($this->request->post['username'],
                            $this->request->post['password'],TRUE))
                    {
                       //echo $this->user->get_username();

                       // var_dump($this->$user);
                        $this->redirect('dashboard');


                    }
                    else{

                        $this->data['error_warning']='Incorrect Username or Password';
                    }
        }
        
        
        $this->data['username']= $this->request->post['username'];
       
        $this->data['action']= 'login';
        $this->template='login';
        $this->data['login_title']='This is footer Title';
        $this->children = array('common/header','common/footer');
        
        

       // $query = $this->db->query('SELECT * FROM user');
        //var_dump($query);
        
       // foreach ($query->rows as $result) {
            //echo $result['username'];
       // }        
        $this->render();
        echo $this->output;
    }
    
     private function validate()
    {
        
        if(strlen($this->request->post['username']) <= 0)
        {
            $this->data['login_username_error']='invalid username';
            $this->error['login_username_error']='invalid username';
            
        }
        
        if(strlen($this->request->post['password']) <= 0)
        {
            $this->data['login_password_error']='invalid password';
            $this->error['login_password_error']='invalid password';
        }
        
        if(!$this->error)
        { return TRUE;}
        else
        { return false;}
       
    }
    
    
    
    
}