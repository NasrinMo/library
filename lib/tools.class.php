<?php

class Tools{
    static function getPost($value){
        if(isset($_POST[$value])){
            return $_POST[$value];
        }
    }
    
    static function getGet($value){
        if(isset($_GET[$value])){
            return $_GET[$value];
        }
    }

}