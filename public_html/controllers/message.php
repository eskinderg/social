<?php
class message extends controller
{
    public function index()
    {
           
       
        $this->template='message';
        $this->children = array('common/header', 'common/footer');
            $this->render();
            echo $this->output;
    }


}