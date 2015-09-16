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
            $this->view->set('message', $this->model->SignUpUser());
        }
        $this->view->generate('SignUpView.php' , 'TemplateView.php');
    }
}