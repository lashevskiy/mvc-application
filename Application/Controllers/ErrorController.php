<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.07.2015
 * Time: 22:20
 */

namespace MainAppSpace;


class ErrorController extends Controller
{
    function index()
    {
        $this->view->generate('ErrorView.php' , 'TemplateView.php');
    }
}