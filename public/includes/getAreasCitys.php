<?php
function getAreas(){
    $request ='{
		"modelName": "Address",
		"calledMethod": "getAreas",
		"apiKey": "9703346b39c07141715d9dc0c58b30fd"
	}';

    $header = "Content-type: application/json; \r\n";
    $opts = array(
        'http'=>array(
            'method'=>'POST',
            'content'=>$request,
            'header'=>$header
        )
    );
    $result = file_get_contents('http://api.novaposhta.ua/v2.0/json/Address/getAreas?', 0, stream_context_create($opts));

    echo $result;
}

function getCities(){
    $request ='{
		"modelName": "Address",
		"calledMethod": "getCities",
		"methodProperties": {
			"Ref": "'.$_POST['Ref'].'"
		},
		"apiKey": "9703346b39c07141715d9dc0c58b30fd"
	}';

    $header = "Content-type: application/json; \r\n";
    $opts = array(
        'http'=>array(
            'method'=>'POST',
            'content'=>$request,
            'header'=>$header
        )
    );
    $result = file_get_contents('http://api.novaposhta.ua/v2.0/json/Address/getCities', 0, stream_context_create($opts));

    echo $result;
}

function getWarehouses(){

    $request ='{
		"modelName": "AddressGeneral",
		"calledMethod": "getWarehouses",
		"methodProperties": {
			
		},
		"apiKey": "9703346b39c07141715d9dc0c58b30fd"
	}';

    $header = "Content-type: application/json; \r\n";

    $opts = array(
        'http'=>array(
            'method'=>'POST',
            'content'=>$request,
            'header'=>$header
        )
    );
    $result = file_get_contents('http://api.novaposhta.ua/v2.0/json/Address/getWarehouses', 0, stream_context_create($opts));

    echo $result;
}




$action = (isset($_POST['action']))?$_POST['action']:'';
if($action!=''){
    $action();
}
?>
