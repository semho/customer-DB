<!DOCTYPE html>
<html >
<head lang="ru">
    <meta charset="utf-8">
    <title>Клиентская база</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Добавить клиента</h1>
    <ul>
        <li><a href="/">Вернуться на главную страницу</a></li>
    </ul>
    <form method="post" id = "form_add_news" action="/adminclients/Save">
        <label>Имя<br>
            <input type="text" name="name" id = "name" value="<?=$items->name?>">
        </label><br>
        <label>Фамилия<br>
            <input type="text" name="second" id = "second" value="<?=$items->second?>">
        </label><br>
        <label>Отчество<br>
            <input type="text" name="middle" id = "middle" value="<?=$items->middle?>">
        </label><br>
        <label>Номер телефона<br>
            <input type="text" name="phone" id = "phone" value="<?=$items->phone?>">
        </label><br>
        <input type="hidden" value="Y" name = "hidden">
        <input type="hidden" value="<?=$_GET['id']?>" name = "id_hidden">
        <input type="submit" value="Добавить" id = "submit">
    </form>
</section>
<footer>
    <div>
        <copyright>
    </div>
</footer>

</body>
</html>