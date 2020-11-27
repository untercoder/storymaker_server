<?php
function action ($input_json) {
    include_once '../script/class/make_story.php';

    $room_name = $input_json['room_name'] ?? '';
    if(!is_string($room_name) || empty($room_name)) {
        error('Обязательный параметр "room_name" отсутствует');
    }

    $form = $input_json['form'] ?? '';
    if(!is_array($form) || empty($form)) {
        error('Обязательный параметр "form" отсутствует');
    }

    foreach ($form as $value) {
        if(strlen($value) == 0) {
            error('Все поля form должны быть заполнены');
        }
    }

    $object_story = new make_story($form, $room_name) or die('Error in write room');

    success($object_story -> echo_array()) or error('Error in write room');
}