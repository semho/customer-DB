<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Клиентская база</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Клиент</h1>
    <ul>
        <li><a href="/">Вернуться на главную страницу</a></li>
        <?if (\App\Classes\App::isAdmin($_SESSION['user']['id'])) {?>
            <li><a href="/adminclients/ViewFormNews?id=<?=$items->id?>">Редактировать клиента</a></li>
            <li><a href="/adminclients/DeleteNews?id=<?=$items->id?>">Удалить клиента</a></li>
            <li><a href="/adminCars/ViewFormCars?client_id=<?=$items->id?>">Добавить автомобиль</a></li>
        <?}?>
    </ul>
    <div class ="clients">
        <table cellspacing="0" cellpadding="5" border="1" width="100%">
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Ссылка</th>
            </tr>
            <tr>
                <td><?php echo $items->name; ?></td>
                <td><?php echo $items->second; ?></td>
                <td><?php echo $items->middle; ?></td>
                <td><a href = "/cars/AllShowCars?id=<?=$items->id?>">Список машин</a></td>
            </tr>
        </table>
    </div>
</section>
<footer>
    <div>
        <copyright>
    </div>
</footer>

</body>
</html>