<?php

class User extends Main{


	public function __construct(){
		parent::__construct();
	}

    public function setSession($array){

        $token = $this -> createToken($array);
        $result = $this -> update("users",array("tokenAccess" => $token,
                                                "id" => $array["id"] ) );

        if ($result == true) {
            $_SESSION["user"] = array(  "id"=>$array["id"] ,
                                    "firstName"=>$array["firstName"] ,
                                    "lastName"=>$array["lastName"] ,
                                    "email"=>$array["email"],
                                    "token"=>$token,
                                    "type" => $array["type"]
                                    //"photo"=>$array["imageUrl"]
                                ) ;
        }

    }

    public function createToken($array){

        $time = date("h:i:sa");
        $token = md5($array["email"].salt.$time.$array["type"]);
        
        return $token;
    }

    public function removeToken($array){

        $db = SingletonPDO::getInstance();

        $query = "UPDATE users SET tokenAccess = null WHERE id = ".$array["id"];
        
        $data = $db->prepare($query);
        $result = $data->execute() ;

        return $result;
    }

	public function removeFromMiddleTable($id_user){

        $resultMiddle = $this -> removeFromUsersBooksTable($id_user);

        if($resultMiddle == true){
            $result = array("status"=> true);
            $resultMain = $this -> remove("users",array('id' => $id_user));
        }else{
            $result = array("status"=> false);
            //$result = array("status"=> false , "error" => $conn->error );
        }

        if ($resultMain == false) {
           $result = array("status"=> false);
        }
       
        
    	return $result;

    }
    
    public function removeFromUsersBooksTable($id_user){

        $db = SingletonPDO::getInstance();

        $query = "delete FROM users_books where id_user= ".$id_user;

        $data = $db->prepare($query);
        $result = $data->execute() ;

        return $result;
    }

}

