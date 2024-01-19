<?php

// user: api-client-simple-access
// pass: *EW/Iod25nB3[4[7

use LDAP\Result;

require_once('./function.php');
require_once('./endpoint.php');

$data_api_request = $_REQUEST;

$data_api_response = isset($data_api_request['request']) <> null ? define_data_api_response($data_api_request) : get_fail_result();

define_response($data_api_response);

