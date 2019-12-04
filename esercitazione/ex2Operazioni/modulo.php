<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		    session_start();
			
			if(isset($_SESSION["cntOperazioni"])){
				$cntOperazioni = $_SESSION["cntOperazioni"];
			}
			else{
				$cntOperazioni = 0;
			}
			echo "Il numero di operazioni svolte è " . $cntOperazioni . "<br/><br/>";
		?>
		<form action="dispatcher.php" method="get" >
			<input type="text" name="num1" value="6" />&nbsp;
			<input type="text" name="num2" value="2" />&nbsp;
			<input type="submit" name="bPiu" value="+" />&nbsp;
			<input type="submit" name="bMeno" value="-" />&nbsp;
			<input type="submit" name="bPer" value="*" />&nbsp;
			<input type="submit" name="bDiviso" value="/" />&nbsp;
		</form>
		<hr/>
		<a href="dispatcher.php">Resetta contatore</a><br/>
	</body>
</html>