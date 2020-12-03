<?php

abstract class Main {

    public function __construct()
    {
        // some code here
    }

    public function getAll($tbname){

        $db = SingletonPDO::getInstance();
        $translators = $db->prepare('select * FROM '.$tbname);
        $translators->execute();
        return $translators->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getTableByFields($tbname,$array){

        $db = SingletonPDO::getInstance();

        $query = "select * from ".$tbname." where ";
        foreach ($array as $key => $value) {
        	$query .= $key ."='". $value . "' AND " ;
        }

        $query = substr($query, 0, -4);
        $query .= ";";
        
        $data = $db->prepare($query);
        $data->execute();
        
        return  $data->fetch(PDO::FETCH_ASSOC);   

    }

    public function createMain($tbname,$array){

        $db = SingletonPDO::getInstance();

        if (isset($array["password"])) {
            $array["password"] = md5($array["password"].salt);
        }

        $query = "INSERT INTO ". $tbname ."(";

        foreach ($array as $key => $value) {
            if (is_array($value) !== true ) {
                 $query .= htmlspecialchars("{$key}")." ," ;
            }
        }

        $query = substr($query, 0, -1);
        $query .= ") VALUES (";

        foreach ($array as $key => $value) {
            if (is_array($value) !== true ) {   
                 $query .= htmlspecialchars(":{$key}")." ," ;
            }
        }

        $query = substr($query, 0, -1);
        $query .= ") ;";

        $sth = $db->prepare($query);

        foreach ($array as $key => &$value) { 
            if (is_array($value)) continue;
             $sth->bindParam(":{$key}", $value , PDO::PARAM_STR); 
        }
         
        $result = $sth->execute();
        $lastId =  $db->lastInsertId();
        
        return $lastId;
    }

    public function remove($tbname,$array){

        $db = SingletonPDO::getInstance();     

        $query = "delete FROM ".$tbname." where ";
        foreach ($array as $key => $value) {
             $query .= $key ." = '". $value."' and ";
         }

        $query = substr($query, 0, -4);
        $query .= ";";

        $data = $db->prepare($query);
        if ($data->execute()) {
             $result = array("status"=> true);
        }else{
             $result = array("status"=> false );
         // $result = array("status"=> false , "error" => SingletonPDO::errorInfo()  );
        }
    
        return $result;

    }

    public function update($tbname,$array){

        $db = SingletonPDO::getInstance();

        $query = "update ".$tbname." set ";

        foreach ($array as $key => $value) {
            if($key == "id") continue;
            if (is_array($value) !== true) {
                // $query .= $key."=:{$key} , ";
                $query .= $key." = ".htmlspecialchars(":{$key}")." ,"; 
            }
        }
        
        $query = substr($query, 0, -2);
        $query .=" WHERE id = :id ";
       
        $sth = $db->prepare($query);

        foreach ($array as $key => &$value) {
            if (is_array($value) !== true ) {
                 $sth->bindParam(":{$key}", $value , PDO::PARAM_STR);
            }  
        }
        
        $result = $sth->execute(); 

        return $result;
    

    }

    public function validation($array){

        $error = array();
        $patternEmail= "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
        $pattenPassword= '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/' ;
        $patternYear = "/^[1,2]+[9,0]+[0-9]+[0-9]$/";
        $patternName = "/^[A-Za-z ]+$/i";
        $patternTitle = "/^[A-Za-z0-9- ]+$/i";

        $change = true;

        if ( isset($array["email"]) ) {
            if ($array["email"] != "") {
                if ( !preg_match($patternEmail,$array["email"]) ) {
                    $error["email"] = "Invalid Address Email";
                }

                $user = $this->getTableByFields("users",array("id"=>$array["id"]));
                if ( $array["email"] ===  $user["email"]) {
                     $change = false; ;
                } 

                if ($change === true) {

                    $user = $this->getTableByFields("users",array("email"=>$array["email"]));
                    if ($user > 0) {
                        $error["email"] = "There already exists an account registered with this email address.";
                    }
                }    

            }else{
               $error["email"] = "Email field is empty.";
            }    
        }
        
        if (isset($array["password"])) {
            if ($array["password"] != "") {
                if ( !preg_match($pattenPassword,$array["password"]) ) {
                    $error["password"] = "The password does not meet the requirements!";
                }
            }else{
               $error["password"] = "Password field is empty.";
            }
        }

        if (isset($array["firstName"])) {
            if ($array["firstName"] != "") {
                if ( !preg_match($patternName,$array["firstName"]) ) {
                    $error["firstName"] = "Invalid First Name";
                }
            }else{
               $error["firstName"] = "First Name field is empty.";
            }
        }

        if (isset($array["lastName"])) {
            if ($array["lastName"] != "") {
                if ( !preg_match($patternName,$array["lastName"]) ) {
                    $error["lastName"] = "Invalid Last Name";
                }
            }else{
               $error["lastName"] = "Last Name field is empty.";
            }
        }

        if (isset($array["writer"])) {
            if ($array["writer"] != "") {
                if ( !preg_match($patternName,$array["writer"]) ) {
                    $error["writer"] = "Invalid Writer Name";
                }
            }else{
               $error["writer"] = "Writer field is empty.";
            }
        }

        if (isset($array["title"])) {
            if ($array["title"] != "") {
                if ( !preg_match($patternTitle,$array["title"]) ) {
                    $error["title"] = "Invalid Title";
                }
            }else{
               $error["title"] = "Title field is empty.";
            }
        }

        if (isset($array["year"])) {
            if ($array["year"] != "") {
                if ( !preg_match($patternYear,$array["year"]) ) {
                    $error["year"] = "Invalid Year";
                }
            }else{
               $error["year"] = "Year field is empty.";
            }
        }

        if( count($error) > 0 ){
            return $error;
        }else{
            return true;
        }

    }


}