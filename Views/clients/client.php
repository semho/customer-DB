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
            <li><a href="/admin/ViewFormNews?id=<?=$items->id?>">Редактировать новость</a></li>
            <li><a href="/admin/DeleteNews?id=<?=$items->id?>">Удалить новость</a></li>
        <?}?>
    </ul>
    <div class ="page_client">
        <table>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Марка машины</th>
                <th>Модель</th>
                <th>Ссылка</th>
            </tr>
            <tr>
                <td><?php echo $items->name; ?></td>
                <td><?php echo $items->second; ?></td>
                <td><?php echo $items->middle; ?></td>
                <td><?php echo $items->auto_marka; ?></td>
                <td><?php echo $items->auto_model; ?></td>
                <td>тык</td>
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