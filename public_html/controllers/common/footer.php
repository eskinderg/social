<?php

class footer extends controller
{
    public function index()
    {
        
        $this->template='common/footer';
        $this->data['footer_title']='Copyright inc';
        $this->render();
    }
    
}
