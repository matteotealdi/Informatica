<?php
    session_start();

	if(!isset($_SESSION["confronti"])){
		$_SESSION["confronti"]=array();
	}
	
	if(isset($_SESSION["confronti"][2])){
		$json = "{ \"precedente\":".
			"{\"estratto\": " . $_SESSION["confronti"][0] .
			" \"confronto\": " . $_SESSION["confronti"][1] . "},".
				"\"attuale\":".
			"{\"estratto\": " . $_SESSION["confronti"][2] .
			" \"confronto\": " . $_SESSION["confronti"][3] . "}".
			"}";
		echo $json;
	}
	else{
		echo "Json non generabile mancano i dati storici!!";
	}
?>