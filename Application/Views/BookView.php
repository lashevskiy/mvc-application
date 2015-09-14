<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 1:14
 */
?>
<?php if($book > 0) { ?>
<div class="middle">
    <section class="section">
        <div class="box-wrapper-view">
            <div class="box-content-view">
                <div class="content-img-view">
                    <img src="/Images/<?php echo $book[0]['isbn']; ?>.jpg" alt="Нет изображения" title="<?php echo $book[0]['title']; ?>">
                </div>
                <div class="description-view">
                    <h1><?php echo $book[0]['title']; ?></h1>
                    <h2 class="author-view"><?php echo $book[0]['author']; ?></h2>
                    <h3 class="price-view"><?php echo $book[0]['price']; ?> р.</h3>

                    <ul>
                        <li>
                            <span class="description-row-1">Год:</span>
                            <span class="description-row-2"><?php echo $book[0]['year']; ?></span>
                        </li>
                        <li>
                            <span class="description-row-1">Страниц:</span>
                            <span class="description-row-2"><?php echo $book[0]['pages']; ?></span>
                        </li>
                        <li>
                            <span class="description-row-1">ISBN:</span>
                            <span class="description-row-2"><?php echo $book[0]['isbn']; ?></span>
                        </li>
                    </ul>
                    <div class="box-button">
                        <a href="#"><button class="button-add">Купить</button></a>
                    </div>
                </div>
            </div>
            <div class="box-heading">Описание</div>
            <div class="description-info"><?php echo $book[0]['description']; ?></div>
        </div>
    </section>
</div>
<?php } ?>