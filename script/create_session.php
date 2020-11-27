<?php
    session_start() or die("Session no");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
	<link rel="stylesheet" href="css/create_session_style.css">
    <link rel="icon" href="script/img/favicon.ico" type="image/x-icon">
</head>
<body>
<div class ="container">
<?php
    include_once 'class/make_story.php';
    $query = "http://lexamok.beget.tech/script/read.php?name_table=";
    $full_link = "${query}${_GET['name_table']}";
    $_SESSION['table'] = $_GET['name_table'] or die("No table name");
    echo '<h1 class="h1">'.'Вы вошли в комнату '.$_SESSION['table'].'</h1>';
    $counter = new make_story(null,$_SESSION['table']);
    $result = $counter -> count();
    echo '<h5 class= "h5">'.'Всего полей в таблице:'.$result.'<h5/>'.'<br/>';
    unset($counter);
?>

</br>

<button class="button button2" onclick="location.href = '<?=$full_link?>'">Начать игру</button>
<button class="button button1" onclick="document.location = '/'">Вернуться к выбору комнаты</button>
</div>
</body>
</html>