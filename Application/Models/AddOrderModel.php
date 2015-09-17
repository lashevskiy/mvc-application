<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.09.2015
 * Time: 0:59
 */
?>
<?php
session_start();
if(isset($_POST['bookId']))
{
    $_SESSION['order'][$_POST['bookId']] = $_SESSION['order'][$_POST['bookId']] + 1;
    $_SESSION['totalOrder'] = $_SESSION['totalOrder'] + 1;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] + $_POST['bookPrice'];

    /*setcookie("bookId33", 77777777,time()+3600);*/
}
?>
