<?php
    session_start();

	if(!isset($_SESSION["confronti"])){
		$_SESSION["confronti"]=array();
	}
	
	if(isset($_SESSION["confronti"][1])){
		$json = 
			"{\"estratto\": " . $_SESSION["confronti"][0] .
			" \"confronto\": " . $_SESSION["confronti"][1] . "}";
		echo $json;
	}
	else{
		echo "Json non generabile manca un estrazione!!";
	}
?>