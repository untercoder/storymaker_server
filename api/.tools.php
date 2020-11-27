<?php
function error($message) {
    $data['error'] = true;
    $data['message'] = $message;
    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    die($json);
}

function success($result) {
    $data['error'] = false;
    $data['result'] = $result;
    $json = json_encode($data, JSON_UNESCAPED_UNICODE);
    die($json);
}

