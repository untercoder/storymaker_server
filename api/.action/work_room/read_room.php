<?php
include_once '../script/class/make_story.php';
 function action ($input_json) {
     $room_name = $input_json['room_name'] ?? '';
     if(!is_string($room_name) || empty($room_name)) {
         error('Обязательный параметр "room_name" отсутствует');
     }


     $object_story = new make_story(null, $room_name) or die('Error in read room');

     success($object_story -> echo_array()) or error('Error in read room');
 }