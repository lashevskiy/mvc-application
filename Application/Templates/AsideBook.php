<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 15:29
 */
?>
<ul>
    <?php foreach($booksAside as $bookAside) { ?>
    <div class="box-heading-aside">Рекомендуем</div>
    <li class="box-wrapper-aside">
        <div class="box-content">
            <div class="content-img">
                <a href="/book/<?php echo $bookAside['isbn']; ?>">
                    <img src="/Images/<?php echo $bookAside['isbn']; ?>.jpg" alt="Нет изображения" title="<?php echo $bookAside['title']; ?>">
                </a>
            </div>
            <p class="author">
                <?php echo $bookAside['author']; ?>
            </p>
            <div class="description">
                <a href="/book/<?php echo $bookAside['isbn']; ?>">
                    <div class="wrapper">
                        <?php echo $bookAside['title']; ?>
                    </div>
                </a>
            </div>
            <span class="price">
                <?php echo $bookAside['price']; ?> р.
            </span>
            <div class="box-button">
                <a href="#"><button class="button-add">Купить</button></a>
            </div>
        </div>
    </li>
    <?php } ?>
</ul>


