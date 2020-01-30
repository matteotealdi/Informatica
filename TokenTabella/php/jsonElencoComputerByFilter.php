<?php require("./connection.php");
    

    if(isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
    }else{
        $id = "";
    }


    if(isset($_REQUEST["marcaTastiera"])){
        $marcaTastiera = $_REQUEST["marcaTastiera"];
    }else{
        $marcaTastiera = "";
    }

    if(isset($_REQUEST["marcaVideo"])){
        $marcaVideo = $_REQUEST["marcaVideo"];
    }else{
        $marcaVideo = "";
    }
	
	if(isset($_REQUEST["marcaCase"])){
        $marcaCase = $_REQUEST["marcaCase"];
    }else{
        $marcaCase = "";
    }

  
    $sql = " select * from computer";
        if($marcaTastiera!=""){
            $sql .= " where marcaTastiera= $marcaTastiera";
        }
        if($marcaVideo!=""){
            $sql .= " where marcaVideo= $marcaVideo";
        }
        if($id!=""){
            $sql .= " where id= $id";
        }
		if($marcaCase!=""){
            $sql .= " where marcaCase= $marcaCase";
        }
        

    $rs = $con->query($sql);
    if($rs==false){
        die("sql error".$con->error."<br/>".$sql);
    }

    $vet=array();
    
        while($record = $rs->fetch_assoc()){
            array_push($vet, $record);  

    }

    $json = json_encode($vet);
    echo $json;


?>