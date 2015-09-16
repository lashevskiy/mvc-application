<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 1:31
 */
?>
<div class="middle">
    <section class="section">
        <div class="box-wrapper-view">
            <form class="sign-form" action="#" method="POST" onsubmit="return CheckRegForm(this)">
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
                    <input type="email" name="email" class="input-text" placeholder="E-mail адрес" required value="<?php echo $user['email']; ?>">
                </fieldset>
                <fieldset>
                    <label for="password">Password: *</label>
                    <input type="password" name="password" class="input-text" placeholder="Придумайте пароль" required>
                </fieldset>
                <fieldset>
                    <label for="confirm-password">Confirm password: *</label>
                    <input type="password" name="confirm-password" class="input-text" placeholder="Повторите пароль" required>
                </fieldset>
                <button type="submit" name="SignUpButtonClick" class="button sign">Зарегистрироваться</button>
            </form>
        </div>
    </section>
</div>
