<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 15.09.2015
 * Time: 13:47
 */

namespace MainAppSpace;


class SignInController extends Controller
{
    public function index()
    {
        parent::index();
        $this->view->set('header', 'Вход пользователя');

        if (isset($_POST['SignInButtonClick']))
        {
            $result = $this->Login();
            if ($result === true)
            {
                header('Location: /');
                exit();
            }
            else $this->view->set('message', $result);
        }
        $this->view->generate('SignInView.php' , 'TemplateView.php');
    }

    function Login()
    {
        if (isset($_POST['username'], $_POST['password'])) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = $_POST['password']; // The hashed password.

            if ($this->model->Login($username, $password))
            {
                return true;
            }
            else
            {
                return '<p class="error">Вы что-то явно ввели не так...</p>';
            }
        }
        else
        {
            // The correct POST variables were not sent to this page.
            return 'Что-то пошло не так.';
        }
    }

}