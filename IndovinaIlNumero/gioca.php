<?php 
    session_start();
    $_SESSION["nTentativi"] = $_SESSION["nTentativi"] +1;
    $numeroInserito = $_REQUEST["numero"];
    if($numeroInserito == $_SESSION["nRandom"]){
        echo "INDOVINATO!!! Il numero era: ". $_SESSION["nRandom"]. "<br>";
        $_SESSION["vincita"]=1;
    }
    if($numeroInserito < $_SESSION["nRandom"]){
        echo "SBAGLIATO!!! Il numero è maggiore di ". $numeroInserito. "<br>";
    }
    if($numeroInserito > $_SESSION["nRandom"]){
        echo "SBAGLIATO!!! Il numero è minore di ". $numeroInserito. "<br>";
    }
    if($_SESSION["nTentativi"]>=4 && $_SESSION["vincita"]=0){
        echo "MI SPIACE HAI PERSO! TENTATIVI FINITI! <br> IL NUMERO ERA ". $_SESSION["nRandom"];
    }else{
        if($_SESSION["vincita"]==0){
            require 'gioco.html';
        }else{
            echo "FINE GIOCO!";
        }
       
    }
    sleep(3);
    

?>