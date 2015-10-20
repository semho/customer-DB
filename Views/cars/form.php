<!DOCTYPE html>
<html >
<head lang="ru">
    <meta charset="utf-8">
    <title>Клиентская база</title>
    <link rel="stylesheet" href="/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Добавить автомобиль</h1>
    <ul>
        <li><a href="/">Вернуться на главную страницу</a></li>
    </ul>
    <form method="post" id = "form_add_news" action="/adminCars/Save">
        <label>Марка автомобиля<br>
            <input type="text" name="auto_marka" id = "auto_marka" value="<?=$items->auto_marka?>">
        </label><br>
        <label>Модель автомобиля<br>
            <input type="text" name="auto_model" id = "auto_model" value="<?=$items->auto_model?>">
        </label><br>
        <label>Год<br>
            <input type="text" name="year" id = "year" value="<?=$items->year?>">
        </label><br>
        <label>Объем<br>
            <input type="text" name="volume" id = "volume" value="<?=$items->volume?>">
        </label><br>
        <label>Л.с.<br>
            <input type="text" name="power" id = "power" value="<?=$items->power?>">
        </label><br>
        <label>ГУР<br>
            <select name="gur">
                <option disabled selected >Есть ГУР?</option>
                <option value="да" <?if ($items->GUR == "да"){?>selected<?}?>>Да</option>
                <option value="нет" <?if ($items->GUR == "нет"){?>selected<?}?>>Нет</option>
            </select>
        </label><br>
        <label>ABS<br>
            <select name="abs">
                <option disabled selected >Есть ABS?</option>
                <option value="да" <?if ($items->ABS == "да"){?>selected<?}?>>Да</option>
                <option value="нет" <?if ($items->ABS == "нет"){?>selected<?}?>>Нет</option>
            </select>
        </label><br>
        <label>VIN<br>
            <input type="text" name="vin" id = "vin" value="<?=$items->VIN?>">
        </label><br>
        <input type="hidden" value="Y" name = "hidden">
        <input type="hidden" value="<?=$_GET['id']?>" name = "id_hidden">
        <input type="hidden" value="<?=$_GET['client_id']?>" name = "client_id_hidden">
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