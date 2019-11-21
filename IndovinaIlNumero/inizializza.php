<?php 
	session_start();
    $_SESSION["nRandom"]=rand(0,10);
    $_SESSION["nTentativi"]=0;
    $_SESSION["vincita"]=0;
    echo "Inizializzazione avvenuta";
?>