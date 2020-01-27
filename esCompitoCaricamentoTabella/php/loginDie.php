<?php require("connection.php"); ?>
<?php
	if(isset($_REQUEST["txtUser"]) && $_REQUEST["txtUser"] != "")//se il parametro è settato e non è vuoto
        $user=$_REQUEST["txtUser"];
    else
        die("Username mancante");//altrimenti cade la connessione
		
	if(isset($_REQUEST["txtPwd"]) && $_REQUEST["txtPwd"] != "")//se il parametro è settato e non è vuoto
        $pwd=$_REQUEST["txtPwd"];
    else
        die("Password mancante");//altrimenti cade la connessione

	
	$sql="SELECT idUtente FROM utenti WHERE nome='".$user."' AND password='".$pwd."'";
	$result=$con->query($sql);
	
	if($result===false)
	{
		die("SQL ERROR: " . $con->error);
	}
	if($result->num_rows==0)
		die("credenziali errate");
	else
	{ 
		setcookie("id", $result->fetch_array()[0]); //trasforma in un vettore la prima riga del risultato
		header("Location: ./Tabelle.php");
	}
?>