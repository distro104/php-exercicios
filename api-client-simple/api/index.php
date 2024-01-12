<?php

$request = $_GET['param'];
$data['status'] = "ERROR";
$data['data'] = null;

switch ($request) {
    case 'status':
        define_response($data, 'API RUNING OK!...');
        break;

    case 'getnumber':
        define_response($data, 'THE NUNBER IS!...');
        break;
}

// MOSTRA O RESULTADO DA BUSCA.
response($data);

function geraRand(int $qtd = 1)
{
    $result = [];
    
}

//
function define_response(&$data, $value)
{
    $data['status'] = 'SUCCESS!';
    $data['data'] = $value;
}

// CONSTRUCAO DA RESPONSE
function response($data_response)
{
    header("Content-Type:application/json");
    echo json_encode($data_response);
}
