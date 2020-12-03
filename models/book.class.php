<?php

class Book extends Main{


    public function __construct(){
        parent::__construct();
    }

    public function removeFromMiddleTable($id_book){

        $resultMiddle1 = $this -> removeBookFromMiddles("books_translators",$id_book);
        $resultMiddle2 = $this -> removeBookFromMiddles("users_books",$id_book);

        if($resultMiddle1 == true && $resultMiddle2 == true){
            $result = array("status"=> true);
            $resultMain = $this -> remove("books",array('id' => $id_book));
        }else{
            $result = array("status"=> false);
            //$result = array("status"=> false , "error" => $conn->error );
        }

        if ($resultMain == false) {
           $result = array("status"=> false);
        }
       
        
        return $result;

    }
    public function removeBookFromMiddles($tbname,$id_book){

        $db = SingletonPDO::getInstance();

        $query = "delete FROM ".$tbname." where id_book= ".$id_book;

        $data = $db->prepare($query);
        $result = $data->execute() ;

        return $result;
    }

    public function getTranslatorByBookID($id_book){

    	$db = SingletonPDO::getInstance(); 
        
    	$query = "select t.* ,bt.*
					from translators t join books_translators bt
					on t.id =bt.id_translator 
					where bt.id_book=".$id_book;

		$resultQuery = $db->prepare($query);
        $resultQuery->execute();
        $translators = $resultQuery->fetchAll(PDO::FETCH_ASSOC);

        $result["books"] = $this -> getTableByFields("books",array('id'=>$id_book ));

        foreach ($translators as $key => $value) {
           $result["books"]["translators"][$value["id"]] = $value;
        }

        $result["allTranslators"] = $this -> getAll("translators");
       // Func :: dd($result);
        return $result;

    }

    public function updateMainAndMiddle($array){

  		$resultMiddle = $this -> removeBookFromMiddles("books_translators",$array["id"]);      
        if (isset($array["translators"]) && isset($array["translators"]) > 0) {
            $resultAdd = $this ->  addBooksTranslators($array["translators"],$array["id"]);
        }

        $result = $this -> update("books",$array);
       
        return $result;
    }

    public function addBooksTranslators($array,$id_book){

        $db = SingletonPDO::getInstance();

        $query = "INSERT INTO books_translators ( id_book , id_translator )";
        $query .= "VALUES";


        foreach ($array as $key => $value) {
             $query .=" ({$id_book},{$value} ) , " ;
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

    public function getCommentsByBookID($id_book){

        $db = SingletonPDO::getInstance(); 
        
        $query = "select u.firstName,u.lastName ,ub.*
                    from users u join users_books ub
                    on u.id =ub.id_user 
                    where ub.id_book=".$id_book." order by ub.update_at DESC";

        $resultQuery = $db->prepare($query);
        $resultQuery->execute();
        $comments = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
       
        return $comments;

    }

}

