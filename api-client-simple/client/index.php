<?php

define('API_BASE','http://localhost/php-exercicios/api-client-simple/api/?param=status');

echo '<h3>APLICACAO<h3><hr />';

$resultado = api_request();
var_dump($resultado);

function api_request()
{
    $client = curl_init();

    curl_setopt($client, CURLOPT_URL, API_BASE);

    $response = curl_exec($client);

    curl_close($client);

    return $response;
}