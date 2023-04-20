<h2 class="centr">Авторизация</h2>
<?php
if (!app()->auth::check()):
    ?>
    <form method="post">
        <div class="login">
            <h2><?= $message ?? ''; ?></h2>
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Логин <br><input type="text" name="login" required=""></label>
            <label>Пароль <br><input type="password" name="password" required=""  ></label>
            <button class="down">Войти </button>
        </div>
    </form>
<?php endif;