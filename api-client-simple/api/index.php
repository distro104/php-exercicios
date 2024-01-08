<?php


// VERIFICA SE HA DADO NA REQUISICAO
$request = $_REQUEST;
if (!isset($request['param'])) {
    die("1");
}

$method = $_SERVER['REQUEST_METHOD'];
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

// CONSTRUCAO DA RESONSE
function response($data_response)
{
    header("Content-Type:application/json");
    echo json_encode($data_response);
}