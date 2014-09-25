<?php


class aaa extends controller {
    public function index()
    {
        $this->template='aaa';
        $this->children = array('common/header','common/footer');
        
       // $this->document->addScript('views/scripts/controll.js');
        $this->document->addScript('views/scripts/aaa.js');
        $this->document->addStyle('views/stylesheets/aaa.css');
        
        $this->render();
        echo $this->output;
    }
}
