<?php

class logout extends controller {
    public function index()
    {
        if($this->user->isLogged())
        {
            $this->user->logout();
            $this->redirect('home');
        }
    }
}
