<?php
session_start();

//print_r($_SESSION);

//!isset($_SESSION["utente"]) : true/false
//se non è settato non sono passato dalla pagina di login
//   if( !isset( $_SESSION["utente"] ))

if( !isset( $_SESSION["utente"] ))
{
	header("Location: ./login.php");
}


?>