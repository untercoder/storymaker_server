<?php
/*
    Скрипт обрабатывает только POST запросы на вход принимает JSON файлы
*/
header('Content-Type: application/json; charset=utf-8' );

require_once '.tools.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    die('Ошибка можно отправит только POST запрос!');
}

$post_body = file_get_contents('php://input');

if($post_body === false) {
    error('Тело POST-запроса отсутствует');
}

$input_json = json_decode($post_body, true, 5);

if(!is_array($input_json)) {
    error('Тело POST-запроса не является JSON-объектом');
}

$entity = $input_json['entity'] ?? '';
if(!is_string($entity) || empty($entity)) {
    error('Обязательный параметр "entity" отсутствует');
}

global $allowed_entities;

require_once '.allowed.php';
if(!in_array($entity, $allowed_entities, true)) {
    error('Указанная сущность не существует');
}

$action = $input_json['action'] ?? '';
if(!is_string($action) || empty($action)) {
    error('Обязательный параметр ".action" отсутствует');
}

global $allowed_actions;
/** @noinspection PhpIncludeInspection */
require_once ".action/${entity}/allowed.php";
if(!in_array($action, $allowed_actions, true)) {
    error('Указанное действие не применимо к этой сущности');
}

/** @noinspection PhpIncludeInspection */
require_once ".action/${entity}/${action}.php";
action($input_json);





