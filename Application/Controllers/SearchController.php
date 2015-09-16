<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 14.09.2015
 * Time: 22:14
 */

namespace MainAppSpace;


class SearchController extends Controller
{
    function index()
    {
        $books = $this->model->searchBooks();

        parent::index();

        if(empty($books))
        {
            $this->view->set('header', 'Информации не найдено');
            $this->view->generate('ErrorView.php' , 'TemplateView.php');
        }
        else
        {
            $this->view->set('header', 'Результаты поиска');
            $this->view->set('books', $books);
            $this->view->generate('SearchView.php', 'TemplateView.php');
        }
    }
}