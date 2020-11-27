<?php
include_once '../script/class/make_story.php';
function action ($input_json) {

    $show = new BDTools(null,null,false);
    success($show -> show_table()) or error('Error in get_rooms');
}