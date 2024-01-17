<?php

// ------------------------------------------------------------------------------------
function get_success_result()
{
    return $result = [
        'status' => "SUCCESS!",
        'data' => []
    ];
}

// ------------------------------------------------------------------------------------
function get_fail_result()
{
    return $result = [
        'status' => "FAIL REQUEST!...!",
        'data' => null
    ];
}

// ------------------------------------------------------------------------------------
function get_data_status_api()
{
    $result = [
        'status' => "SUCCESS!",
        'data' => null,
    ];
    return $result;
}

// ------------------------------------------------------------------------------------
function get_random_number($data_request)
{
    if (!isset($data_request['min']) || !isset($data_request['max'])) {
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

