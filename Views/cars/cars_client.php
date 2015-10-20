<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Клиентская база</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Автомобили клиента</h1>
    <ul>
        <li><a href="/">Вернуться на главную страницу</a></li>
        <? if (\App\Classes\App::isAdmin()) { ?>
            <li><a href="/adminCars/ViewFormCars?client_id=<?=$items[0]->client_id?>">Добавить автомобиль</a></li>
        <?}?>
    </ul>
    <div class ="clients">
        <table cellspacing="0" cellpadding="5" border="1" width="100%">
            <tr>
                <th>Марка машины</th>
                <th>Модель</th>
                <th>Год</th>
                <th>Объем</th>
                <th>Л.с.</th>
                <th>ГУР</th>
                <th>ABS</th>
                <th>VIN</th>
                <th <?if (\App\Classes\App::isAdmin()) {?>
                    colspan="2"
                   <?}?> >Заказы на авто</th>
            </tr>
            <?php foreach ($items as $item):?>
            <tr>
                <td><?php echo $item->auto_marka; ?></td>
                <td><?php echo $item->auto_model; ?></td>
                <td><?php echo $item->year; ?></td>
                <td><?php echo $item->volume; ?></td>
                <td><?php echo $item->power; ?></td>
                <td><?php echo $item->GUR; ?></td>
                <td><?php echo $item->ABS; ?></td>
                <td><?php echo $item->VIN; ?></td>
                <td><a href="/orders/AllShowOrders?id=<?=$item->id?>">Перейти к заказам</a></td>
                <? if (\App\Classes\App::isAdmin()) { ?>
                <td><a href="/adminOrders/ViewFormOrders?cars_id=<?=$item->id?>">Создать заказ</a></td>
                <td><a href="/adminCars/ViewFormCars?id=<?=$item->id?>">Редактировать автомобиль</a></td>
                <td><a href="/adminCars/DeleteCars?id=<?=$item->id?>">Удалить автомобиль</a></td>
                <?}?>
            </tr>
            <?endforeach;?>
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