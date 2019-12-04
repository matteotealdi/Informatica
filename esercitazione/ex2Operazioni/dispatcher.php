<?php
    session_start();
	
	if(!isset($_SESSION["cntOperazioni"])){
		$_SESSION["cntOperazioni"]=1;
	}
	else{
		$_SESSION["cntOperazioni"]=$_SESSION["cntOperazioni"]+1;
	}
	
	if(isset($_REQUEST["bPiu"])){
		header("Location: somma.php?num1=" . $_REQUEST["num1"] . "&num2=" . $_REQUEST["num2"]);
		exit;
    }
	if(isset($_REQUEST["bMeno"])){
		header("Location: sottrazione.php?num1=" . $_REQUEST["num1"] . "&num2=" . $_REQUEST["num2"]);
		exit;
    }
	if(isset($_REQUEST["bPer"])){
		header("Location: moltiplicazione.php?num1=" . $_REQUEST["num1"] . "&num2=" . $_REQUEST["num2"]);
		exit;
    }
	if(isset($_REQUEST["bDiviso"])){
		header("Location: divisione.php?num1=" . $_REQUEST["num1"] . "&num2=" . $_REQUEST["num2"]);
		exit;
    }
	header("Location: resetta.php");
?>