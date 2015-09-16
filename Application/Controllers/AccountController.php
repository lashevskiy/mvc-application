<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 15.09.2015
 * Time: 19:40
 */

namespace MainAppSpace;


class AccountController extends Controller
{
    public function index()
    {
        parent::index();

        if (true/*$this->CheckLogin()*/)
        {
            $this->account();
        }

        $this->view->set('header', 'Личный кабинет');
        $this->view->generate('AccountView.php' , 'TemplateView.php');
    }


    function account()
    {
        parent::index();

        if (!true/*!$this->CheckLogin()*/)
        {
            /*header("Location: /account");*/
        }
        if (isset($_POST['SignOutButtonClick']))
        {
            $this->Logout();
        }

        $this->view->set('header', 'Личный кабинет');
        $info = $this->model->GetUserInfo();

        if($info === false)
        {

            $this->view->set('message', 'Ошибка в получении данных');
        }
        else
        {
            $this->view->set('user', $info);
        }

         /*

         if(isset($_POST['SaveChangesButtonClick'])){
             $this->view->set('message', $this->model->UpdateUser());
         }

         if(isset($_POST['SavePasswordChangesButtonClick'])){
             $this->view->set('message', $this->model->UpdatePassword());
         }

         $info = $this->model->GetUserInfo();
         if($info === false) {
             $this->view->set('message', 'Ошибка в получении данных');
         }
         else{
             $this->view->set('username', $_SESSION['username']);
             $this->view->set('firstname', $info['firstname']);
             $this->view->set('lastname', $info['lastname']);
             $this->view->set('email', $info['email']);
         }*/

        $this->view->generate('AccountView.php' , 'TemplateView.php');
    }

    function Logout()
    {
        echo "LOGOUT";
        $_SESSION=array();

        if (session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time()-2592000, '/');

        session_destroy();
        header("Location: /");
        exit();
    }

}