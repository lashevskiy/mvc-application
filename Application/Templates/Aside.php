<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 10.09.2015
 * Time: 22:37
 */
?>

<?php
$url = explode('/', $_SERVER['REQUEST_URI']);
$class = "";
?>
<div class="content middle">
    <aside class="aside">
        <ul class="nav-aside">
            <?php foreach($menuItems as $key => $value) {
                if(isset($url[1]) and $url[1] == 'books')
                {
                    if(empty($url[2]) and $key == '0')
                    {
                        $class = "class = 'active'";
                    }
                    else if(isset($url[2]) and $key == $url[2])
                    {
                        $class = "class = 'active'";
                    }
                    else $class = "";
                }

                ?>
                <li><a href="/books/<?php echo $key; ?>" <?php echo $class; ?>><?php echo $value['sName']; ?></a></li>
            <?php } ?>
        </ul>

        <?php include("AsideBook.php"); ?>

    </aside>
</div>