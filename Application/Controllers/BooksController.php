<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 16:12
 */

namespace MainAppSpace;

class BooksController extends Controller
{
    public function index($category = null)
    {
        parent::index();
        $books = $this->model->getBooks($category);

        if(empty($books))
        {
            $this->view->set('header', 'Информации не найдено');
            $this->view->generate('ErrorView.php' , 'TemplateView.php');
        }
        else
        {
            $this->view->set('books', $books);
            $this->view->generate('BooksView.php' , 'TemplateView.php');
        }
    }
}