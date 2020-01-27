/*function login(){
	
	var user = document.getElementById("txtUser").value;
	var pwd = document.getElementById("txtPwd").value;
	if(user=="")
	{
		alert("Username mancante");
	}
	else{
		
		if(pwd=="")
			alert("Password mancante");
		else
			inviaRichiesta("./php/login.php?user="+user+"&pwd="+pwd, "GET", verifica);		
	}
}

function verifica(responseText){
	
	var json = JSON.parse(responseText);
	if(json.length==1){
		$nome=json[0]["nome"];
		$psw=json[1]["password"];
		inviaRichiesta("./php/setSessionVariable.php?nome="+$nome+"&password="+$psw, "GET", completa);
	}
	else{
		location.replace("index.php");
		alert("Credenziali errate");
	}
	
}

function completa(responseText){

	location.replace("Tabelle.php");
	
}*/