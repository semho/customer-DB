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
    <div class ="news">
        <?php foreach ($items as $item):?>
            <div>
                <h3>
                    <a href = "/clients/OneShow?id=<?=$item->id?>" >
                        <?php echo $item->name; ?>
                    </a>
                </h3>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<footer>
    <div>
        <copyright>
    </div>
</footer>

</body>
</html>