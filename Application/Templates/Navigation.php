<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 10.09.2015
 * Time: 21:41
 */
?>
<nav class="nav">
    <div class="middle">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/orders">Корзина покупок</a></li>
            <?php
            if(isset($_SESSION['username'])) {?>
            <li><a href="/account">Личный кабинет</a></li>
            <?php } else {?>
            <li><a href="/signin">Личный кабинет</a></li>
            <li><a href="/signup">Регистрация</a></li>
            <?php }?>
        </ul>
        <form class="search-form" action="/search" method="POST">
            <input type="text" name="search" class="search-input" placeholder="ISBN, автор или название"><!--<button type="submit" class="search-button">Найти</button>-->
        </form>
    </div>
</nav>