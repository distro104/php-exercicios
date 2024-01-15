<?php

$request = $_GET['param'];
$data['status'] = "ERROR";
$data['data'] = null;

switch ($request) {
    case 'status':
        define_response($data, 'API RUNING OK!...');
        break;

    case 'getnumber':
        define_response($data, get_random_number());
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

function get_random_number($value = 10)
{
    $number = [];
    array_push($number, "GERANDO VALORES ALEATORIOS!!");
    for ($i=0; $i < $value; $i++) {
        array_push($number, rand(1, 100));
    }
    array_push($number, "FINALIZADO!!!");
    return $number;
}