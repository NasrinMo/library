 <?php 
/**
 * 
 */
class ControllerTranslator
{
	private $_translator;

	public function __construct(){
        $this->_translator = new Translator();
    }

	public function list(){

		$content = $this->_translator->getAll("translators");
		$array = array("content" => $content);

		$viewTranslatorList = new View('translatorlist');
		$viewTranslatorList->generate($array);
	}

	public function detail($id){

		$user =$this->_translator-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($user["type"]) && in_array($user["type"], usersType) ) {

			$content = $this->_translator-> getBookByTranslatorID($id);
			$array = array("content" => $content);

			$viewTranslatorDetail = new View('translatordetail');
			$viewTranslatorDetail->generate($array);
		}else{
    			die("Forbidden"); 
    	}	

	}
	
	public function delete($array){

		$result =$this->_translator-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

    			$resultQuery = $this->_translator->removeFromMiddleTable($array["id"]) ;
				return $resultQuery;
    	}else{
    			die("Forbidden"); 
    	}
		
	}

	public function edit($id,$errors=""){ 

		$result =$this->_translator-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {
				$content = $this->_translator-> getBookByTranslatorID($id);
				$content["errors"] = $errors;
				$array = array("content" => $content);

				$viewTranslatorEdit = new View('translatoredit');
				$viewTranslatorEdit->generate($array);
    	}else{ 
    			die("Forbidden"); 
    	}

	}

	public function modify($array){
        
        $result =$this->_translator-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

        		if ($this ->_translator->validation($array) === true) {
                    $resultQuery = $this->_translator->updateMainAndMiddle($array) ;
        			return $resultQuery;
                }else{
                    return $this ->_translator->validation($array);
                }
    	}else{
    			die("Forbidden"); 
    	}
    }

	public function add(){

		$result =$this->_translator-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

				$content["allBooks"] = $this->_translator->getAll("books");
				$array = array("content" => $content);

				$viewTranslatorAdd = new View('translatoradd');
				$viewTranslatorAdd->generate($array);
    	}else{
    			die("Forbidden"); 
    	}
	}

	public function create($array){

        $result =$this->_translator-> getTableByFields("users",array('tokenAccess' => $_SESSION["user"]["token"]));

    	if ( isset($result["type"]) && 
    		 ($result["type"] == A || $result["type"] == SA) ) {

				$resultCreate = $this->_translator->createMain("translators",$array) ;
      
		        if (isset($array["books"]) && count($array["books"]) > 0) {
		       		 $resultQuery = $this->_translator->addBooksTranslators($array["books"],$resultCreate);
		    	}
		        
		        return $resultCreate;
    	}else{
    			die("Forbidden"); 
    	}
    }
 
}