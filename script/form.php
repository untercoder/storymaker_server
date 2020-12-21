<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Storymaker</title>
	<link rel="stylesheet" href="css/form_style.css">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="header">
    <h1>STORYMAKER</h1>
</div>
<div class ="container">
    <div class="middle">
        <form action="write.php" method="get" >
             <input type="text" name="who" placeholder="Кто?"> <br/><br/>
             <input type="text" name="where" placeholder="Где?"> <br/><br/>
             <input type="text" name ="do" placeholder="Что сделал?"> <br/><br/>
             <input type="text" name="what_for" placeholder="Зачем?"> <br/><br/>
             <input type="text" name="end" placeholder="Чем закончилось?"> <br/><br/>
                <br/>
             <input class="button" type="submit" name="button" value="Записать">
        </form>
        <br/>
        <a class="button1" onclick="document.location = 'http://lexamok.beget.tech/script/read.php'">Прочитать</a>
        <a class="button2" onclick="document.location = '/'">Вернуться к выбору комнаты</a>
    <div/>
<div/>
</body>
</html>