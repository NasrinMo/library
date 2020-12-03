<?php

class Controller {
    
    private $_ctrlHome;
    private $_ctrlBook;
    private $_ctrlTranslator;
    private $_ctrlUser;
    
    public function __construct(){
        $this->_ctrlHome = new ControllerHome();
        $this->_ctrlBook = new ControllerBook();
        $this->_ctrlTranslator = new ControllerTranslator();
        $this->_ctrlUser = new ControllerUser();
    }
    
    public function router(){
        try{

            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            }else{
                $action = "";
            }

            if (isset($_GET["model"])) {
                $model = $_GET["model"];
            }else{
                $model = "";
            }

            switch ($model) {
                case 'translator':
                    switch ($action) {
                        case 'list':
                            $this->_ctrlTranslator->list();
                            break;
                        case 'detail':
                            $this->_ctrlTranslator->detail($_GET["id"]);
                            break;
                        case 'delete':
                            $resultQuery = $this->_ctrlTranslator->delete(array("id" => $_GET["id"]));
                            $this->_ctrlTranslator->list();
                            break;
                        case 'edit':
                            $this->_ctrlTranslator->edit($_GET["id"]);
                            break;
                        case 'update':
                            $result = $this->_ctrlTranslator->modify($_POST);
                            if ( $result === true ) {
                                    $this->_ctrlTranslator->list();
                                }else{
                                    $this->_ctrlTranslator->edit($_POST["id"],$result);
                                }
                            break;
                        case 'add':
                            $this->_ctrlTranslator->add();
                            break;
                        case 'insert':
                            $this->_ctrlTranslator->create($_POST);
                            $this->_ctrlTranslator->list();
                            break;
                    }
                    break;

                case 'book':
                    switch ($action) {
                        case 'list':
                            $this->_ctrlBook->list();
                            break;
                        case 'detail':
                            $this->_ctrlBook->detail($_GET["id"]);
                            break;
                        case 'delete':
                            $resultQuery = $this->_ctrlBook->delete(array("id" => $_GET["id"]));
                            $this->_ctrlBook->list();
                            break;
                        case 'edit':
                            $this->_ctrlBook->edit($_GET["id"]);
                            break;
                        case 'update':
                            $result = $this->_ctrlBook->modify($_POST);
                            if ( $result === true ) {
                                    $this->_ctrlBook->list();
                            }else{
                                    $this->_ctrlBook->edit($_POST["id"],$result);
                            }
                            break;
                        case 'add':
                            $this->_ctrlBook->add();
                            break;
                        case 'insert':
                            $result = $this->_ctrlBook->create($_POST);
                            if ( $result === true ) {
                                    $this->_ctrlBook->list();
                            }else{
                                    $this->_ctrlBook->add($result);
                            }
                            break;
                        case 'addComment':
                            $this->_ctrlBook->addComment($_GET["id"]);
                            break; 
                        case 'insertComment':
                            $this->_ctrlBook->createComment($_POST);
                            $this->_ctrlBook->addComment($_GET["id"]);
                            break;   
                    }
                    break;

                case 'user':
                    switch ($action) {
                        case 'login':
                            $this->_ctrlUser->login();
                            break;
                        case 'authentified': 
                            $result = $this->_ctrlUser->checkUser($_POST);

                            if ( $result === true ) {
                                    $this->_ctrlHome->home();
                            }else{
                                    $this->_ctrlUser->login("failed");
                            }
                            break;
                        case 'logout':
                            $this->_ctrlUser->logout();
                            break;
                        case 'signup':
                            $this->_ctrlUser->signup();
                            break;
                        case 'list':
                            $this->_ctrlUser->list();
                            break;
                        case 'detail':
                            $this->_ctrlUser->detail($_GET["id"]);
                            break;
                        case 'delete':
                            $resultQuery = $this->_ctrlUser->delete( array("id" => $_GET["id"]));
                            $this->_ctrlUser->list();
                            break;
                        case 'edit':
                            $this->_ctrlUser->edit($_GET["id"]);
                            break;
                        case 'update':
                            $result = $this->_ctrlUser->modify($_POST);
                            
                            if ( $result === true ) {
                                    $this->_ctrlUser->list();
                            }else{
                                    $this->_ctrlUser->edit($_POST["id"],$result);
                            }
                            break;
                        case 'add':
                            $this->_ctrlUser->add();
                            break;
                        case 'insert':
                            $result = $this->_ctrlUser->create($_POST);

                            if ( isset($_SESSION["user"]["id"]) ) {
                                if ( $result === true ) {
                                    $this->_ctrlUser->list();
                                }else{
                                    $this->_ctrlUser->add($result);
                                }
                            }else{
                                if ( $result === true ) {
                                    $this->_ctrlUser->login("success");
                                }else{
                                    $this->_ctrlUser->signup($result);
                                }

                            }
                            break;
                    }
                    break;
                
                default:
                        $this->_ctrlHome->home();
                    break;
            }       

        }catch(Exception $e){
            include('views/view_error.php');
        }   
    }
    
} 