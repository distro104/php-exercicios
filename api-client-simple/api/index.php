<?php

// VERIFICA SE HA DADO NA REQUISICAO
$request = $_REQUEST;

$data = [];

switch ($request['param']) {
    case 'status':
        $data['status'] = "SUCCESS!";
        $data['data'] = "API RUNING OK...";
        break;
    default:
        $data['status'] = "ERROR...";
        break;
}

// MOSTRA O RESULTADO DA BUSCA.
response($data);

// CONSTRUCAO DA RESPONSE
function response($data_response)
{
    header("Content-Type:application/json");
    echo json_encode($data_response);
}