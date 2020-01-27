<?php require("./connection.php"); 

if(isset($_GET["testo"]))
	$nome=$_GET["testo"];
else 
	$nome="";

if(isset($_GET["auto"]))
	$auto=true;
else 
	$auto=false;

if(isset($_GET["moto"]))
	$moto=true;
else 
	$moto=false;

if(($moto && !$auto ) ||(!$moto && $auto ))
{
	$sel="and tipo = '". ($moto?"moto":"auto") ."'";
}
else 
	$sel="";

$sql="select *
from veicoli 
where (marca like '%".$nome."%' or modello like '%".$nome."%') " .$sel;

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
