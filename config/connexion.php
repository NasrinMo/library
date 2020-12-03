<?php
define('CRTL_DIR', 'controllers/');
define('CLASS_DIR', 'models/');	// Chemin vers les classes
define('LIB_DIR', 'lib/');	// Chemin vers les classes
define('VIEW_DIR', 'views/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);	// Ajoute le chemin dans les "path"
set_include_path(get_include_path().PATH_SEPARATOR.LIB_DIR);// Ajoute le chemin dans les "path"
set_include_path(get_include_path().PATH_SEPARATOR.CRTL_DIR); 
set_include_path(get_include_path().PATH_SEPARATOR.VIEW_DIR);
spl_autoload_extensions('.class.php');	// Défini l'extension de fichier ".class.php" = Personne.class.php
spl_autoload_register();
define('SA', 'superAdmin');
define('A', 'admin');
define('U', 'user');
define('usersType', array(U , SA , A ));
define('salt', "!@#1qaEf?%");




