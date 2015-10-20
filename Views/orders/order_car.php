<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Клиентская база</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Заказы клиента по автомобилю</h1>
    <ul>
        <li><a href="/">Вернуться на главную страницу</a></li>
        <? if (\App\Classes\App::isAdmin()) { ?>
            <li><a href="/adminOrders/ViewFormOrders?cars_id=<?=$items[0]->cars_id?>">Добавить заказ</a></li>
        <?}?>
    </ul>
    <div class ="clients">
        <table cellspacing="0" cellpadding="5" border="1" width="100%">
            <tr>
                <th>Запчасть</th>
                <th>Артикул</th>
                <th>ОЕ</th>
                <th>Поставщик</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Дата</th>
            </tr>
            <?php foreach ($items as $item):?>
                <tr>
                    <td><?php echo $item->part; ?></td>
                    <td><?php echo $item->article; ?></td>
                    <td><?php echo $item->OE; ?></td>
                    <td><?php echo $item->provider; ?></td>
                    <td><?php echo $item->quantity; ?></td>
                    <td><?php echo $item->price; ?></td>
                    <td><?php echo $item->data_a; ?></td>
                    <? if (\App\Classes\App::isAdmin()) { ?>
                        <td><a href="/adminOrders/ViewFormOrders?id=<?=$item->id?>">Редактировать заказ</a></td>
                        <td><a href="/adminOrders/DeleteOrders?id=<?=$item->id?>">Удалить заказ</a></td>
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