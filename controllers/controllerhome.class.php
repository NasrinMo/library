<?php

class ControllerHome{
    
    public function home(){
        $viewHome = new View('home');
        $viewHome->generate(array('content'=>"Welcome Page"));
    }
}