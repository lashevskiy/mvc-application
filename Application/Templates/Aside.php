<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 10.09.2015
 * Time: 22:37
 */
?>

<?php

//TODO: убрать логику из html: перенести выставление активного элемента меню в функцию
$url = trim($_SERVER['REQUEST_URI'], '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);
$class = "";
?>
<div class="content middle">
    <aside class="aside">
        <ul class="nav-aside">
            <?php foreach($menuItems as $key => $value) {
                $class = "";
                if(isset($url[0]) and $url[0] === 'books')
                {
                    if(isset($url[1]) and $key == $url[1])
                        $class = "class = 'active'";
                    else
                        $class = "";
                }
                else $class = "";
                ?>
                <li><a href="/books/<?php echo $key; ?>" <?php echo $class; ?>><?php echo $value['sName']; ?></a></li>
            <?php } ?>
        </ul>

        <?php include("AsideBook.php"); ?>

    </aside>
</div>