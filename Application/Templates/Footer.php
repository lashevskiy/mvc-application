<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 10.09.2015
 * Time: 21:40
 */
?>
<?php
/*require_once BASE_PATH . D_CONTROLLER . 'PageController.php';
$pageController = new MainAppSpace\PageController();
$menuItems = $pageController->GetMenu();*/
?>
<!--<div id="map" class="map"></div>-->

<footer class="footer">
    <div class="middle">
        <div class="footer-layout-column">
            <h1>Категории</h1>
            <ul>
                <?php foreach($menuItems as $key => $value) { ?>
                    <li><a href="/books/category/<?php echo $key; ?>" <?php echo $class; ?>><?php echo $value['sName']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="footer-layout-column">
            <h1>Навигация</h1>
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#">Личный кабинет</a></li>
                <li><a href="#">Регистрация</a></li>
            </ul>
        </div>
        <div class="footer-layout-column">
            <h1>Информация</h1>
            <ul>
                <li><a href="#">Главная</a></li>
                <li><a href="#">Личный кабинет</a></li>
                <li><a href="#">Регистрация</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
        <div class="footer-layout-column">
            <h1>Подпишись</h1>
            <ul>
                <li><a href="#">ВКонтакте</a></li>
                <li><a href="#">Инстаграмм</a></li>
                <li><a href="#">GMail</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">RSS</a></li>
            </ul>
        </div>
    </div>
</footer>