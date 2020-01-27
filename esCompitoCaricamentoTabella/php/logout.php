<?php 
session_start();
session_unset();//rimuove tutte le variabili della sessione
session_destroy();//elimina la sessione
setcookie("id","", 1);
header("Location: ./login.php");
?>