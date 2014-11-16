<?php
class message extends controller
{
    public function index()
    {
        if(!$this->user->isLogged())
            $this->redirect ('register');
            
        $this->document->addStyle('views/stylesheets/message.css');
        $this->document->addScript('views/scripts/message.js');
        $this->template='message';
        $this->children = array('common/header', 'common/footer');
        
        
        $this->data['messages'] = array(
        array('email'=>'message1','subject'=> 'To whom it my concern','message'=>'bodytext'),
        array('email'=>'message2','subject'=> 'To whom it my concern','message'=>'bodytext'),
        array('email'=>'message3','subject'=> 'To whom it my concern','message'=>'bodytext'),
        );
        
            $this->render();
            echo $this->output;
    }


}