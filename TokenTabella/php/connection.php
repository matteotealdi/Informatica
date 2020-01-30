<?php //ACCESSO AL DATABASE
	define('DBNAME', '5ainf1920');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	
	$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	if($con-> connect_errno){  
		$codice = $con ->connect_errno;     
		$descErrore = $con->connect_error;	
		die("Errore di connessione: $codice - $descErrore");


	}
?>