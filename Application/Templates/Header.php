<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 10.09.2015
 * Time: 21:40
 */
?>

<header class="header clearfix">
    <div class="middle">
        <div class="layout-column-1">
            <a href="/">
                <img src="/Images/logo.png" alt="BookStore" title="BookStore">
            </a>
        </div>
        <a href="/orders" id="card">
        <div class="layout-column-2">
            <div class="orderCount">Товаров: <span id="orderCount" orderCount="<?php if(isset($_SESSION['totalOrder'])) echo $_SESSION['totalOrder']; else echo "0"; ?>"><?php if(isset($_SESSION['totalOrder'])) echo $_SESSION['totalOrder']; else echo "0"; ?></span></div>
            <div class="orderPrice">На сумму: <span id="orderPrice" orderPrice="<?php if(isset($_SESSION['totalPrice'])) echo $_SESSION['totalPrice']; else echo "0"; ?>"><?php if(isset($_SESSION['totalPrice'])) echo $_SESSION['totalPrice']; else echo "0"; ?></span> руб.</div>
        </div>
        <div class="layout-column-2">
            <img src="/Images/shopping_trolley.png" alt="BookStore" title="BookStore">
        </div>
        </a>
        <p class="orderMessage"></p>
    </div>
</header>