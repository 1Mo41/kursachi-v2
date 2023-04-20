<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/style/style.css">
    <title>Pop it MVC</title>
</head>
<body>
<main>
    <h2 class="centr">Добавить в меню</h2>

    <form method="post">
        <div class="zapros">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Ингредиент<br> <input type="text" name="ФИО"></label>
            <label>Ингредиент<br><input type="date" name="birthday"></label>
            </label>

            <label>Описание <br><input type="text" name="Адрес"></label>
            <label>Цена<br> <input type="number" name="age"></label>




            <button>Добавить</button>
        </div>
    </form>
</main>
</body>
</html>