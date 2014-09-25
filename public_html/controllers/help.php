<?php
class help extends controller
{
    public function index()
    {
        $this->template = 'help';
        
        $this->children = array('common/header','common/footer');
        $this->render();
        echo $this->output;
    }
}
