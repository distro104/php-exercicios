<?php

define('API_BASE_URL','http://localhost/php-exercicios/api-client-simple/api/?request=getnumber&min=1&max=100');

echo '<h3>APLICACAO<h3><hr />';

$resultado = api_data_request();
var_dump($resultado);die();
if($resultado['status']=='ERROR'){ die('Ocorreu um erro'); }

echo '<pre>';
print_r($resultado);
echo '</pre>';

function api_data_request()
{
    $api_server = curl_init(API_BASE_URL);
    curl_setopt($api_server, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($api_server);

    // return json_decode($response);
    return json_decode($response, true);
}