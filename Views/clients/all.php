<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <?php if (!empty($_SESSION['user']['login'])){?>
    <div class="user">Привет, <?=$_SESSION['user']['login']?>!</div>
    <?php } ?>
    <h1>Все клиенты</h1>
    <? if (\App\Classes\App::isAdmin()) { ?>
    <ul class="links">
        <li>
            <!--<a href="/admin/ViewFormNews">-->
                Добавить клиента
            <!--</a>-->
        </li>
    </ul>
    <? } ?>
    <div class = "auto">
        <span><a href = "/auto/Authentication">Авторизация</a></span> || <span><a href = "/auto/Reg">Регистрация</a></span> || <span><a href="/auto/Logout">Выход</a></span>
    </div>
    <div class="clear"></div>
    <div class ="clients">
        <table>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Марка машины</th>
                <th>Модель</th>
                <th>Ссылка</th>
            </tr>
        <?php foreach ($items as $item):?>
            <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->second; ?></td>
                <td><?php echo $item->middle; ?></td>
                <td><?php echo $item->auto_marka; ?></td>
                <td><?php echo $item->auto_model; ?></td>
                <td><a href = "/clients/OneShow?id=<?=$item->id?>" >Переход на детальный просмотр</a></td>
            </tr>
        <?php endforeach; ?>
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