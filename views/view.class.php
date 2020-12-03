<?php

class View {
    //Nom du fichier associé à la vue
    private $_file;
    
    function __construct($action){
        $this->_file = "views/view_".$action.".php";
    }
    
    function generate($datas){
        $content = $this->generate_file($this->_file, $datas);
        $view = $this->generate_file('views/main_template.php', array('content'=>$content));

        echo $view;
    }
    
    private function generate_file($file, $datas){
        if(file_exists($file)){
            //array('livre'=>array('id'=>6, 'auteur'=>blal));
            extract($datas);
            //$livre = array('id'=>6, 'auteur'=>blal);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        
    }
}