<?php
include_once '../script/class/BDTools.php';
function action ($input_json) {

    $room_name = $input_json['room_name'] ?? '';
    if(!is_string($room_name) || empty($room_name)) {
        error('Обязательный параметр "room_name" отсутствует');
    }

    new BDTools(null,$room_name, true);

    success(array("answer" => true)) or error('Error in create room');
}
