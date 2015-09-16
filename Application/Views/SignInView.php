<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 2:48
 */
?>
<div class="middle">
    <section class="section">
        <div class="box-wrapper-view">
            <form class="sign-form" action="#" method="POST">
                <?php if (isset($message)) echo $message; ?>
                <fieldset>
                    <label for="username">Username: *</label>
                    <input type="text" name="username" class="input-text" placeholder="Логин" required>
                </fieldset>
                <fieldset>
                    <label for="password">Password: *</label>
                    <input type="password" name="password" class="input-text" placeholder="Придумайте пароль" required>
                </fieldset>
                <button type="submit" name="SignInButtonClick" class="button sign">Войти</button>
            </form>
        </div>
    </section>
</div>
