<!DOCTYPE html>
<html >
<head lang="ru">
    <meta charset="utf-8">
    <title>Клиентская база</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Добавить заказ</h1>
    <ul>
        <li><a href="/">Вернуться на главную страницу</a></li>
    </ul>
    <form method="post" id = "form_add_news" action="/adminOrders/Save">
        <label>Двигатель<br>
            <textarea name="engine"><?=$items->engine?></textarea>
        </label><br>
        <label>Система подвески<br>
            <textarea name="suspension_system"><?=$items->suspension_system?></textarea>
        </label><br>
        <input type="hidden" value="Y" name = "hidden">
        <input type="hidden" value="<?=$_GET['id']?>" name = "id_hidden">
        <input type="hidden" value="<?=$_GET['cars_id']?>" name = "cars_id_hidden">
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