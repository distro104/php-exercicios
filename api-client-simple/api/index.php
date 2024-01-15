<?php

use LDAP\Result;

$data_api_request = $_REQUEST;

// NECESSARIO TRATAR O PROBLEMA SE FORNECIDO O VALOR QUE NAO EXISTE A VARIAVEL PASSADA (data_api_request['request'])!
$data_api_response = isset($data_api_request['request']) <> null ? define_data_api_response($data_api_request) : get_fail_result();

define_response($data_api_response);

// ---------------------------------------------------------------------------------- //
function define_data_api_response($data_api_request)
{
    $data = null;
    switch ($data_api_request['request']) {
        case 'status':
            $data = get_data_status_api();
            break;

        case 'getnumber':
            $data = get_random_number($data_api_request);
            break;

        default:
            $data = get_fail_result();
            break;
    }
    return $data;
}

function get_data_status_api()
{
    $result = [
        'status' => "SUCCESS!",
        'data' => null,
    ];
    return $result;
}

function get_random_number($data_request)
{
    if (!isset($data_request['min']) ||  !isset($data_request['max'])) {
        $result = get_fail_result();
        return $result;
    }

    $result = get_success_result();
    array_push($result['data'], "GERANDO VALORES ALEATORIOS!!");
    for ($i = 0; $i < 10; $i++) {
        array_push($result['data'], rand($data_request['min'], $data_request['max']));
    }
    array_push($result['data'], "FINALIZADO!!!");

    return $result;
}

function get_success_result()
{
    return $result = [
        'status' => "SUCCESS!",
        'data' => []
    ];
}

function get_fail_result()
{
    return $result = [
        'status' => "FAIL REQUEST!...!",
        'data' => null
    ];
}

// CONSTRUCAO DA RESPONSE
function define_response($api_data_response)
{
    header("Content-Type:application/json");
    echo json_encode($api_data_response);
    // var_dump($api_data_response);
}
