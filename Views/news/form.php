<!DOCTYPE html>
<html >
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Добавить новость</h1>
    <ul>
        <li><a href="/">Вернуться на главную страницу</a></li>
    </ul>
    <form method="post" id = "form_add_news" action="/admin/Save">
        <label>Заголовок новости<br>
            <input type="text" name="title" id = "title" value="<?=$items->title?>">
        </label><br>
        <label>Содержание новости<br>
            <textarea name="text"><?=$items->text?></textarea>
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