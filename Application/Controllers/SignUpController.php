<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 15.09.2015
 * Time: 13:46
 */

namespace MainAppSpace;


class SignUpController extends Controller
{
    public function index()
    {
        parent::index();
        $this->view->set('header', 'Регистрация пользователя');
        $this->view->set('user', $this->model->setUserInfo());
        if (isset($_POST['SignUpButtonClick']))
        {
            /*$message = $this->view->set('message', $this->model->SignUpUser());*/
            $message = $this->model->SignUpUser();
            if($this->model->SignUpUser() === true)
            {
                $this->view->set('message', '<p class="error">Поздравлем! Вы успешно зарегистрировались!</p>' . '<p class="error">Сейчас Вы будете перенаправлены на страницу для входа...</p>');

                header('Refresh:5; URL=/signin' );

                /*header('Location: /signin');*/
                /*$this->view->generate('SignInView.php' , 'TemplateView.php');*/
            }
            else {
                $message = $this->view->set('message', $message);
                $this->view->generate('SignUpView.php', 'TemplateView.php');
            }
        }
        $this->view->generate('SignUpView.php' , 'TemplateView.php');
    }
}