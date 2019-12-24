<?php

session_start();

function deliver_response($status,$tipo,$valores){

	header('Content-Type:application/json');
    header("HTTP/1.1 $status $status_message");
	$response['respuesta'] = $status;
	$response['tipos'] = $tipo;
    $response['valores'] = $valores;
    $json_response = json_encode($response);
    echo $json_response;
}

if(isset($_GET['respuesta'])){
	
	if($_GET['respuesta']){

		if($_SESSION['tipo'][0]==null){
			$_SESSION['tipo'][0]="null";
		}

		if($_SESSION['imagen'][0]==null){
			$_SESSION['imagen'][0]="null";
		}

		deliver_response(200, $_SESSION['tipo'],$_SESSION['imagen']);
	}

	else{
		deliver_response(200, 'null','null');
	}
	
}

else{
	deliver_response(400, 'null','null');
}

session_unset();

?>