<?php 
	session_start();
	require("connection.php");
?>
<?php
	$message="";
	if(isset($_REQUEST["txtUser"]))
	{		
	
		if(isset($_REQUEST["txtUser"]) && $_REQUEST["txtUser"] != "")//se il parametro è settato e non è vuoto
			$user=$_REQUEST["txtUser"];
		else
			$message="Username mancante";

		if($message=="")
		{
			if(isset($_REQUEST["txtPwd"]) && $_REQUEST["txtPwd"] != "")//se il parametro è settato e non è vuoto
				$pwd=$_REQUEST["txtPwd"];
			else
				$message="Password mancante";
		}
			
		if($message=="")
		{	
			$sql="SELECT idUtente, Nome, Cognome FROM utenti WHERE nome='".$user."' AND password='".$pwd."'";
			$result=$con->query($sql);
			
			if($result===false)
			{
				$message="SQL ERROR: " . $con->error;
			}
			
			if($result->num_rows==0)
				$message="credenziali errate";
			else
			{
				//imposto le caratteristiche del'utente in sessione
				$vet=array();
				while($record= $result->fetch_assoc())
					array_push($vet, $record);
				$utente=$vet[0];
				$_SESSION["utente"]=$utente;
				//print_r($_SESSION);
				
				setcookie("id", $result->fetch_array()[0]); //trasforma in un vettore la prima riga del risultato
				header("Location: ./Tabelle.php");
			}
		}
	}
	//echo "message: " . $message;
	//die($message);
	
?>
<!doctype html>
<html lang="it">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title></title>

<!-- Bootstrap core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->

<link href="../css/style.css" rel="stylesheet">

<!--script type="application/javascript" src="./js/script.js"></script-->

</head> 

	<body>
	<div class="container-fluid">
				<div class="row" style="margin-top: 20px">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
							<p>
							<?php
								echo $message;
							?>
						</p>
					</div>
					<div class="col-sm-4">
					</div>
				</div>
				<div class="row" style="margin-top: 20px">
					<div class="col-sm-4">
					</div>
					<div class="col-sm-4">
						<form method="GET" name="f1" action="login.php"> <!-- action è la pagina alla quale viene fatta la richiesta quando si schiaccia su submit(che gli passa tutti gli elementi in automatico) -->
							<div class="form-group input-group"> 
								<input type="text" id="txtUser" name="txtUser" class="form-control" placeholder="Username" /> 
							</div>
							<div class="form-group input-group">
								<input type="password" id="txtPwd" name="txtPwd" class="form-control" placeholder="Password" />
							</div>
							<div class="form-group">
								<input type="submit" value="Invia" class="btn btn-secondary form-control"/> 
							</div>
							<p>Prova password con nome "Beppe" e password "password1"</p>
						</form>
					</div>
					<div class="col-sm-4">						
					</div>
				</div>
			<!--</div>-->
		</div>
	</body>
</html>