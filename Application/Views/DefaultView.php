<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 1:21
 */
?>


<?php if($contentArray > 0) {
    foreach($contentArray as $key => $books) { ?>
    <div class="middle">
        <section class="section">
            <div class="box-heading"><?php echo $titleArray[$key]; ?></div>
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
                                <button class="button-add" bookPrice = "<?php echo $book['price']; ?>" bookId = "<?php echo $book['isbn']; ?>">Купить</button></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </div>
    <?php } ?>
<?php } ?>

