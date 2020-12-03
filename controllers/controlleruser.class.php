<?php
/**
 * 
 */
class ControllerUser
{
	private $_user;

	public function __construct(){
        $this->_user = new User();
    }

    public function login($message=""){

		$viewlogin = new View('login');
        $array = array("content" => $message);
		$viewlogin->generate( $array );
                
	}

	public function checkUser($array){

        if (isset($array["password"])) {
            $array["password"] = md5($array["password"].salt);
        }

		$user = $this->_user->getTableByFields("users",$array);        
        
        if ($user === false) {
            return false;
        }
		if (isset($user) && $user >= 0) {
			$this->_user->setSession($user);
            return true;
		}else{
            return false;
        }

	}

	public function logout(){

        $this ->_user-> removeToken( $_SESSION["user"] );

        unset($_SESSION['user']);  
        session_destroy();

        $viewHome = new View('home');
       	$viewHome->generate(array('content'=>"Welcome Page"));   
	}

	public function signup($errors=""){

		$viewSignup = new View('signup');
        $array = array("content" => $errors);
		$viewSignup->generate( $array );
	}

	public function list(){

		$result =$this->_user-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$content = $this->_user->getAll("users");
				$array = array("content" => $content);

				$viewUserList = new View('userlist');
				$viewUserList->generate($array);
    	}else{
    			die("Forbidden"); 
    	}
	}

	public function detail($id){

		$result =$this->_user-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$content = $this->_user-> getTableByFields( "users",array("id" => $id) );
				$array = array("content" => $content);

				$viewUserDetail = new View('userdetail');
				$viewUserDetail->generate($array);
    	}else{
    			die("Forbidden"); 
    	}

	}
	
	public function delete($array){

		$result =$this->_user-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$resultQuery = $this->_user->removeFromMiddleTable( $array["id"] );
				return $resultQuery;
    	}else{
    			die("Forbidden"); 
    	}
		
	}

	public function edit($id,$errors=""){

		$result =$this->_user-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$content = $this->_user-> getTableByFields( "users",array("id" => $id) );
                $content["errors"] = $errors;
				$array = array("content" => $content);

				$viewUserEdit = new View('useredit');
				$viewUserEdit->generate($array);
    	}else{
    			die("Forbidden"); 
    	}

	}

	public function modify($array){

		$result =$this->_user-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

        if ( isset($result["type"]) && 
             ($result["type"] == A || $result["type"] == SA) ) {

                if ($this ->_user->validation($array) === true) {

                    $resultQuery = $this->_user->update("users",$array) ;
                    if ( $_SESSION["user"]["id"] == $array["id"] ) {
                        $this->_user->setSession($array);
                    }
                    return true;
                }else{
                    return $this ->_user->validation($array);
                }         
        }else{
             die("Forbidden"); 
        }

    }

    public function add($errors=""){

    	$result =$this->_user-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {
    		$viewUserAdd = new View('useradd');
            $array = array("content" => $errors);
			$viewUserAdd->generate( $array );
    	}else{
    		die("Forbidden"); 
    	}

	}

	public function create($array){

        if(isset($_SESSION["user"]["token"]) && $_SESSION["user"]["token"] != ""){
            $result =$this->_user-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));
        }

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

                if ($this ->_user->validation($array) === true) {
                    $resultCreate = $this->_user->createMain("users",$array) ;
                    return true;
                }else{
                    return $this ->_user->validation($array);
                }        
    		
    	}else{

            unset($array["type"]);
            if ($this ->_user->validation($array) === true) {
                $resultCreate = $this->_user->createMain("users",$array) ;
                return true;
            }else{
                return $this ->_user->validation($array);
            }  

    	}
  
    }

}