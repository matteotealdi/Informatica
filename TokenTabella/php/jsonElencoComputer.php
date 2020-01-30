<?php require("./connection.php");

    $sql = " select * from computer";

    $rs = $con->query($sql);
    if($rs==false){
        die("sql error".$con->error."<br/>".$sql);
    }

    $vet=array();
    
        while($record = $rs->fetch_assoc()){
            array_push($vet, $record); 

    }

    $json = json_encode($vet);
    //echo $json;




?>

<html lang="it">
<head>
<!--istruzioni per il bootstrap-->

<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Tealdi">
		<meta name="description" content="Prenotazione ombrelli">
		
		<title>Tabella Cognome Nome</title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<script href="vendor/bootstrap/js/bootstrap.js"></script>
		<script type="application/javascript" src="js/script.js"></script>
		<script type="application/javascript" src="vendor/jquery/jquery-3.4.1.js"></script>
 </head>
    <body>
        
    <div class="container-fluid">
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-4">						
            </div>
            <div class="col-sm-4">
                <table  class="table table-hover" border="1" >
                <tr>
                        
                        <th>ID</th>
                        <th>MARCA TASTIERA</th>
                        <th>MARCA VIDEO</th>
                        <th>MARCA CASE</th>
                        
                    </tr>

                    <?php

                        foreach($vet as $key=>$value){
                            echo "<tr>";
                            foreach($value as $chiave=>$valore){
                                echo "<td>$valore</td>";
                            }
                            echo "</tr>";
                        }

                    ?>

                </table>
            </div>
            <div class="col-sm-4">						
            </div>

        </div>

    </div>




    </body>


 </html>