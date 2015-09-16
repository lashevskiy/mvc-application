<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 14.09.2015
 * Time: 22:09
 */
?>
<?php if($books > 0) { ?>
    <div class="middle">
        <section class="section">
            <ul class="books-list">
                <?php foreach($books as $book) { ?>
                    <li class="box-wrapper">
                        <div class="box-content">
                            <div class="content-img">
                                <a href="/book/<?php echo $book['isbn']; ?>">
                                    <img src="/Images/<?php echo $book['isbn']; ?>.jpg" alt="Нет изображения" title="<?php echo $book['title']; ?>">
                                </a>
                            </div>
                            <p class="author">
                                <?php echo $book['author']; ?>
                            </p>
                            <div class="description">
                                <a href="/book/<?php echo $book['isbn']; ?>">
                                    <div class="wrapper">
                                        <?php echo $book['title']; ?>
                                    </div>
                                </a>
                            </div>
                    <span class="price">
                        <?php echo $book['price']; ?> р.
                    </span>
                            <div class="box-button">
                                <a href="#"><button class="button-add">Купить</button></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </div>
<?php } ?>
