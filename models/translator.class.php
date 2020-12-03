<?php

class Translator extends Main{


	public function __construct(){
		parent::__construct();
	}



	public function removeFromMiddleTable($id_translator){

        $resultMiddle = $this -> removeFromBooksTranslatorsTable($id_translator);

        if($resultMiddle == true){
            $result = array("status"=> true);
            $resultMain = $this -> remove("translators",array('id' => $id_translator));
        }else{
            $result = array("status"=> false);
            //$result = array("status"=> false , "error" => $conn->error );
        }

        if ($resultMain == false) {
           $result = array("status"=> false);
        }
       
        
        return $result;

    }
    public function removeFromBooksTranslatorsTable($id_translator){

        $db = SingletonPDO::getInstance();

        $query = "delete FROM books_translators where id_translator= ".$id_translator;

        $data = $db->prepare($query);
        $result = $data->execute() ;

        return $result;
    }

    public function getBookByTranslatorID($id_translator){

    	$db = SingletonPDO::getInstance(); 
        
    	$query = "select b.* ,bt.*
					from books b join books_translators bt
					on b.id =bt.id_book 
					where bt.id_translator=".$id_translator;

		$resultQuery = $db->prepare($query);
        $resultQuery->execute();
        $books = $resultQuery->fetchAll(PDO::FETCH_ASSOC);

        $result["translators"] = $this -> getTableByFields("translators",array('id'=>$id_translator ));

        foreach ($books as $key => $value) {
           $result["translators"]["books"][$value["id"]] = $value;
        }

        $result["allBooks"] = $this -> getAll("books");

        return $result;

    }

    public function updateMainAndMiddle($array){
        
        $resultMiddle = $this -> removeFromBooksTranslatorsTable($array["id"]);

        if (isset($array["books"]) && isset($array["books"]) > 0) {
            $resultAdd = $this ->  addBooksTranslators($array["books"],$array["id"]);
        }

        $result = $this -> update("translators",$array);
       
        return $result;
    }

    public function addBooksTranslators($array,$id_translator){

        $db = SingletonPDO::getInstance();

        $query = "INSERT INTO books_translators ( id_book , id_translator )";
        $query .= "VALUES";


        foreach ($array as $key => $value) {
             $query .=" ({$value} ,{$id_translator}) , " ;
        }

        $query = substr($query, 0, -2);
        $query .= " ;";

        $sth = $db->prepare($query);
        
        foreach ($array as $key => &$value) { 
            $sth->bindParam("{$value}", $value , PDO::PARAM_STR);
        }
         
        $result = $sth->execute();
       
        return $result;

    }    

}

