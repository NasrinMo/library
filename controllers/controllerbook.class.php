<?php
/**
 * 
 */
class ControllerBook
{
	private $_book;

	public function __construct(){
        $this->_book = new Book();
    }

	public function list(){

		$content = $this->_book->getAll("books");
		$array = array("content" => $content);

		$viewBookList = new View('booklist');
		$viewBookList->generate($array);
	}

	public function detail($id){

		$user =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($user["type"]) && in_array($user["type"], usersType) ) {

			$content = $this->_book-> getTranslatorByBookID($id);
			$array = array("content" => $content);

			$viewBookEdit = new View('bookdetail');
			$viewBookEdit->generate($array);
			
		}else{
			die("Forbidden"); 
		}

		

	}
	
	public function delete($array){

		$result =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$resultQuery = $this->_book->removeFromMiddleTable($array["id"]) ;
				return $resultQuery;
    	}else{
    			die("Forbidden"); 
    	}	
		
	}

	public function edit($id,$errors=""){

		$result =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$content = $this->_book-> getTranslatorByBookID($id);
                $content["errors"] = $errors;
				$array = array("content" => $content);

				$viewBookDetail = new View('bookedit');
				$viewBookDetail->generate($array);
    	}else{
    			die("Forbidden"); 
    	}

	}

	public function modify($array){

        $result =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {
        		
                if ($this ->_book->validation($array) === true) {

                    $resultQuery = $this->_book->updateMainAndMiddle($array) ;
                    return true;
                }else{
                    return $this ->_book->validation($array);
                }  
    	}else{
    			die("Forbidden"); 
    	}
 
    }

    public function add($errors=""){

		$result =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$content["allTranslators"] = $this->_book->getAll("translators");
                $content["errors"] = $errors;
				$array = array("content" => $content);

				$viewBookAdd = new View('bookadd');
				$viewBookAdd->generate($array);
    	}else{
    			die("Forbidden"); 
    	}
	}

	public function create($array){ 

        $result =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

                if ($this ->_book->validation($array) === true) {
                    $resultCreate = $this->_book->createMain("books",$array) ;

                    if (isset($array["translators"]) && count($array["translators"]) > 0) {
                    $resultQuery = $this->_book->addBooksTranslators($array["translators"],$resultCreate);
                    }
                    return true;
                }else{
                    return $this ->_book->validation($array);
                } 
    	}else{
    			die("Forbidden"); 
    	}
    }

    public function addComment($id){

    	$user =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($user["type"]) && in_array($user["type"], usersType) ) {

    			$content["book"] = $this->_book->getTableByFields("books",array("id" => $id));
    			$content["currentUser"] = $user;
                $content["comments"] = $this ->_book-> getCommentsByBookID($id);
                
				$array = array("content" => $content);

				$viewCommentAdd = new View('commentadd');
				$viewCommentAdd->generate($array);
    	}else{
    			die("Forbidden"); 
    	}
	}

	public function createComment($array){

    	$user =$this->_book-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($user["type"]) && in_array($user["type"], usersType) ) {

    			$resultCreate = $this->_book->createMain("users_books",$array) ;
		        return $resultCreate;
    	}else{
    			die("Forbidden"); 
    	}
    }
	

}