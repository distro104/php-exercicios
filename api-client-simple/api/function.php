<?php

// ------------------------------------------------------------------------------------
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


// ------------------------------------------------------------------------------------
// CONSTRUCAO DA RESPONSE
function define_response($api_data_response)
{
    header("Content-Type:application/json");
    echo json_encode($api_data_response);
    // var_dump($api_data_response);
}