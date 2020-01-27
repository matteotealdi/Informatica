<?php 

require_once ("testLogin.php");

?>

<!doctype html>
<html lang="it">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title></title>
<script src="../vendor/jquery/jquery-3.4.1.js"></script>
<script src="../vendor/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

<script type="application/javascript">
$(document).ready(function(){
	var richiesta;
	
	var jsonUser;
	var dialogUser;
	
	var dialogWaitServer;
	
	function popola()
	{
		if(richiesta.readyState==4)
		{
			$("#dgvDati").html("");
			
			jsonVeichles=JSON.parse(richiesta.responseText);
			if (jsonVeichles.length==0)
			{			
				$("#dgvDati").html("<tr><td>nessun risultato</td></tr>");
			}
			else 
			{
				$("#dgvDati").html("<tr><th></th><th>marca</th><th>modello</th><th>anno</th><th>km</th><th>prezzo</th><th>tipo</th></tr>");
				for(i=0;i<jsonVeichles.length; i++)
				{
					var tr=$("<tr></tr>");
					tr.append($("<td><input type='button' value='dettagli venditore' class='btn btn-outline-info dett' id='"+ jsonVeichles[i].idVeicolo + "' idUtente='"+ jsonVeichles[i].idUtente +"' /></td>"));
					marca=$("<td>"+ jsonVeichles[i].marca +"</td>");
					modello=$("<td>"+ jsonVeichles[i].modello +"</td>");
					anno=$("<td>"+ jsonVeichles[i].anno +"</td>");
					km=$("<td>"+ jsonVeichles[i].km +"</td>");
					prezzo=$("<td>"+ jsonVeichles[i].prezzo +"</td>");
					tipo=$("<td>"+ jsonVeichles[i].tipo +"</td>");
					
					tr.append(marca, modello, anno, km, prezzo, tipo );
					$("#dgvDati").append(tr);
				}
			}
		}
		
		$(".dett").click(function(event)
		{
			//console.log("Dettaglio cliccato: ");
			var idUtente = $(this).attr("idUtente");
			console.log("idUtente: " + idUtente);
			
			$.get("jsonDettaglio.php?idUtente="+idUtente, function(data, status){
				
				//console.log("Data: " + data + "\nStatus: " + status);
				$("#dialog-wait").dialog();
				setTimeout(
					function(){
						$("#dialog-wait").dialog('close');
						popolaDialogUtente(data);
					}, 3000
				);
			});
		});
	}
	
	function popolaDialogUtente(data){

		jsonUser=JSON.parse(data);
		
		$("#fNome").text(jsonUser[0].nome);
		$("#fCognome").text(jsonUser[0].cognome);
		$("#fIndirizzo").text(jsonUser[0].indirizzo);
		$("#fTelefono").text(jsonUser[0].telefono);
		$("#fEmail").text(jsonUser[0].email);
		
		$("#dialog-user").dialog();
	}
	
	$("#btnOut").click(function(){
		location.replace("./logout.php");	
	});

	/*$(document).ready(function(){
		$(".dett").click(function(event)
		{
			console.log("Dettaglio cliccato: ");
			alert("vhjg");
		});
	});*/
	
	$("#btnCerca").click(function(){
		var par;		
		par= "";
		
		if($("#checkMoto").prop('checked')){
			par+= "&moto=1";
		}
		if($("#checkAuto").prop('checked')){
			par+= "&auto=1";
		}
		if($("#txtCerca").val()!="")
		{
			par+= "&testo=" + $("#txtCerca").val();
		}
		if(par[0]=="&")
		{
			par=par.substr(1);
		}
				
		var link="jsonElenco.php?"+par;
		richiesta= new XMLHttpRequest();
		richiesta.open("GET", link,  true); // metodo (POST/GET), pagina a cui fare la richiesta, asincrono (true, false)
		richiesta.onreadystatechange= popola;
		richiesta.send(null);
	});	
});

dialogUser = $( "#dialog-user" ).dialog({
	autoOpen: false,
	height: 400,
	  width: 350,
	  modal: true,
	  buttons: {
		//"Create an account": addUser,
		Cancel: function() {
		  dialog.dialog( "close" );
		}
	  }/*,
	  close: function() {
		form[ 0 ].reset();
		allFields.removeClass( "ui-state-error" );
	  }*/
});

</script>
<!-- Bootstrap core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../vendor/jquery-ui-1.12.1.custom/jquery-ui.css">

<!-- Custom styles for this template -->

<!--link href="css/style.css" rel="stylesheet"-->

<!--script type="application/javascript" src="./js/script.js"></script-->

</head> 

<body>
	<?php
		require ("frontalino.php");
	?>

    <input type='text' id='txtCerca'/>
	<input type='button' id='btnCerca' value='cerca' class='btn btn-outline-info'/>
	<input type='button' id='btnOut' value='logout' class='btn btn-outline-info'/>
	<div class="custom-control custom-checkbox">
		<input type='checkbox' id='checkMoto'  />MOTO <input type='checkbox' id='checkAuto' />AUTO
	</div>
    <div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<table id="dgvDati" class="table table-hover"></table>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div id="dialog-user" title="Basic dialog" style="display: none">
		<p>
			<div class="label">Nome: </div><div class="valore" id="fNome"></div>
			<div class="label">Cognome: </div><div class="valore" id="fCognome"></div>
			<div class="label">Indirizzo: </div><div class="valore" id="fIndirizzo"></div>
			<div class="label">Telefono: </div><div class="valore" id="fTelefono"></div>
			<div class="label">Email: </div><div class="valore" id="fEmail"></div>
		</p>
	</div>
	<div id="dialog-wait" title="Basic dialog" style="display: none">
		<p>
			Attendere la risposta del server...
		</p>
	</div>
	</body>
</html>
