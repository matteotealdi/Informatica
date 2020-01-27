<?php require("./connection.php"); 

if(isset($_GET["idUtente"]))
	$idUtente=$_GET["idUtente"];
else 
	$idUtente="";

$sql="select * 
from utenti ";

if(!$idUtente=="")
	$sql=$sql . " where idUtente = ".$idUtente;

$rs=$con->query($sql);
if($rs===false)
{
	die("sql error". $con->error . " <br/> ".$sql );
}

$vet=array();
while($record= $rs->fetch_assoc())
	array_push($vet, $record);
$json= json_encode($vet);
echo $json;

?>
