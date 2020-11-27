<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
	<link rel="stylesheet" href="css/create_table_style.css">
    <link rel="icon" href="script/img/favicon.ico" type="image/x-icon">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class ="container">
<form action="create_table.php" method="post" >
    <input type="text" name="table_name" placeholder="Table name"> <br/><br/>
    <div class="g-recaptcha" data-sitekey="6LeChM0ZAAAAAN9FuCuUU1SrBdV8Y17ZKiDh5w5F"></div>
    <input type="submit" class="button button1" name="button" value="Создать комнату">
</form>
<br/>
<?php
    include_once 'class/BDTools.php';
    $g_url = "https://www.google.com/recaptcha/api/siteverify";
    $g_key = "6LeChM0ZAAAAAFsyaYGOmHUnkAzfIvib90llpHNY";

    if($_POST['table_name'] && $_POST['g-recaptcha-response']) {
        $g_query = $g_url.'?secret='.$g_key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
        $data = json_decode(file_get_contents($g_query));
        echo $data -> success ;
        if($data -> success == true) {
            $create = new BDTools(null,$_POST['table_name'], true);
            echo '<h1 class="h1">Комната создана<h1>';
        }
        else {
            echo $data -> success ;
        }
    }
    else {
        echo '<h1 class="h1">Тыкни на капчу <h1>';
    }
?>
<button class="button" onclick="document.location = '/'">Вернуться к выбору комнаты</button>
</div>
</body>
</html>

