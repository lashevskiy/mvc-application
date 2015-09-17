<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.09.2015
 * Time: 4:25
 */
?>

<?php if($books > 0) { ?>
    <div class="middle">
        <section class="section">
            <form action="#" method="POST">
            <ul class="books-list">
                <?php foreach($books as $book) { ?>
                    <li class="box-wrapper-order">
                        <div class="box-content-order">
                            <div class="floatleft content-img-order">
                                <a href="/book/<?php echo $book[0]['isbn']; ?>">
                                    <img src="/Images/<?php echo $book[0]['isbn']; ?>.jpg" alt="Нет изображения" title="<?php echo $book[0]['title']; ?>">
                                </a>
                            </div>
                            <div class="floatleft description-order">
                                <a href="/book/<?php echo $book[0]['isbn']; ?>">
                                    <div class="wrapper-order">
                                        <?php echo $book[0]['title']; ?>
                                    </div>
                                </a>
                            </div>
                            <span class="price-order">
                                <?php echo $book[0]['price']; ?> руб.
                            </span>
                            <span class="count-order">
                                <?php echo $_SESSION['order'][$book[0]['isbn']]*$book[0]['price']; ?> руб.
                            </span>
                            <span class="count-order">
                                <?php echo $_SESSION['order'][$book[0]['isbn']]; ?> шт.
                            </span>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <button type="submit" name="BuyButtonClick" class="button sign-order">Купить</button>
        </section>
    </div>
<?php } ?>
