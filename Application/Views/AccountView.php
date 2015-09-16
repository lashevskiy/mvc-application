<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 15.09.2015
 * Time: 16:08
 */
?>
<div class="middle">
    <section class="section">
        <div class="box-wrapper-view">
            <form class="sign-form" action="#" method="POST">
                <?php if (isset($message)) echo $message; ?>
                <fieldset>
                    <label for="username">Username: *</label>
                    <input type="text" name="username" class="input-text" placeholder="Логин" value="<?php echo $user['username']; ?>" required>
                </fieldset>
                <fieldset>
                    <label for="firstname">First name:</label>
                    <input type="text" name="firstname" class="input-text" placeholder="Имя" value="<?php echo $user['firstname']; ?>">
                </fieldset>
                <fieldset>
                    <label for="lastname">Last name:</label>
                    <input type="text" name="lastname" class="input-text" placeholder="Фамилия" value="<?php echo $user['lastname']; ?>">
                </fieldset>
                <fieldset>
                    <label for="email">E-mail address: *</label>
                    <input type="email" name="email" class="input-text" placeholder="E-mail адрес" value="<?php echo $user['email']; ?>" required >
                </fieldset>
                <button type="submit" name="SaveChangesButtonClick" class="button sign">Сохранить изменения</button>
            </form>
            <form class="sign-form margin-top" action="#" method="POST">
                <fieldset>
                    <label for="password">New password: *</label>
                    <input type="password" name="password" class="input-text" placeholder="Новый пароль" required>
                </fieldset>
                <fieldset>
                    <label for="confirm-password">Confirm new password: *</label>
                    <input type="password" name="confirm-password" class="input-text" placeholder="Повторите новый пароль" required>
                </fieldset>
                <button type="submit" name="SavePasswordChangesButtonClick" class="button sign">Сохранить пароль</button>
            </form>
            <form class="sign-form margin-top" action="#" method="POST">
                <button type="submit" name="SignOutButtonClick" class="button-reverse">Выйти из личного кабинета</button>
            </form>
        </div>
    </section>
</div>
