<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.09.2015
 * Time: 4:26
 */

namespace MainAppSpace;


class OrdersController extends Controller
{
    public function index()
    {
        parent::index();

        if (isset($_POST['BuyButtonClick']))
        {
            if($this->model->BuyOrder($_SESSION['order']) === true)
            {
                echo "AAA";
                /*$this->view->set('message', '<p class="error">Поздравлем! Вы успешно зарегистрировались!</p>' . '<p class="error">Сейчас Вы будете перенаправлены на страницу для входа...</p>');*/

                /*header('Refresh:5; URL=/signin' );*/

                /*header('Location: /signin');*/
                /*$this->view->generate('SignInView.php' , 'TemplateView.php');*/
            }
        }


        if(isset($_SESSION['order']))
        {
            foreach($_SESSION['order'] as $bookISBN => $count)
            {
                $book = $this->model->getBookOrder($bookISBN);
                $books[] = $book;
            }

            if (empty($books)) {
                $this->view->set('header', 'Информации не найдено');
                $this->view->generate('ErrorView.php', 'TemplateView.php');
            } else {
                $this->view->set('books', $books);
                $this->view->set('header', 'Корзина покупок');
                $this->view->generate('OrdersView.php', 'TemplateView.php');
            }
        }
        else
        {
            $this->view->generate('ErrorView.php', 'TemplateView.php');
        }

    }
}