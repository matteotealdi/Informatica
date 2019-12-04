<?php
    session_start();

    $valori=[0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	if(!isset($_REQUEST["bInvia"])){
        $estrazione = rand(5, 9);
		$_SESSION["estrazione"] = $estrazione;
		$_SESSION["confronti"]=array();
    }
	else{
		$estrazione=$_SESSION["estrazione"];
	}
	
	$msg="";
    if(!isset($_REQUEST["numeroUtente"])){
		//Non passa mai di qui, perchè se non seleziono si ha 0
		$msg="Selezionare un numero!!";
    }else {
		if($_REQUEST["numeroUtente"] >= $estrazione){
			$msg="Indicare un numero inferiore di quello estratto!!";
		}
		else{
			$msg="Bel lavoro la selezione è corretta!!";
		}
    }
	
	/*if(!isset($_SESSION["confronti"])){
		$_SESSION["confronti"]=array();
	}*/
	if(isset($_SESSION["confronti"][2])){
		$_SESSION["confronti"][0]=$_SESSION["confronti"][2];
		$_SESSION["confronti"][1]=$_SESSION["confronti"][3];
	}
	if(isset($_REQUEST["numeroUtente"])){
		$_SESSION["confronti"][2]=$estrazione;
		$_SESSION["confronti"][3]=$_REQUEST["numeroUtente"];
	}
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form action="confronta2Coppie.php" method="get" >
			<?php
				if(isset($_REQUEST["numeroUtente"])){
					echo "<h1>" . $msg . "</h1>";
				}
				echo $estrazione . " > ";
			?>
			<select name="numeroUtente" >
				<?php
					for($cntN=0; $cntN<10; $cntN=$cntN+1){
						echo "<option value='" . $cntN . "'>" . $valori[$cntN] . "</option>";
					}
				?>
			</select>
			<input type="submit" name="bInvia" value="confronta" />
		</form>
		<hr/>
		<a href="matchJson2Coppie.php">Json ultimi 2 confronti</a><br/>
	</body>
</html>