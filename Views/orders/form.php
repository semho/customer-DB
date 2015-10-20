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
        <label>Запчасть<br>
            <textarea name="part"><?=$items->part?></textarea>
        </label><br>
        <label>Артикул<br>
            <input type="text" name="article" id = "article" value="<?=$items->article?>">
        </label><br>
        <label>ОЕ<br>
            <input type="text" name="oe" id = "oe" value="<?=$items->OE?>">
        </label><br>
        <label>Поставщик<br>
            <input type="text" name="provider" id = "provider" value="<?=$items->provider?>">
        </label><br>
        <label>Количество<br>
            <input type="text" name="quantity" id = "quantity" value="<?=$items->quantity?>">
        </label><br>
        <label>Цена<br>
            <input type="text" name="price" id = "price" value="<?=$items->price?>">
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