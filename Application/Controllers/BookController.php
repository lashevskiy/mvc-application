<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 13.09.2015
 * Time: 15:06
 */

namespace MainAppSpace;

class BookController extends Controller
{
    public function index($isbn = null)
    {
        parent::index();
        $book = $this->model->getBookDescription($isbn);

        if(empty($book))
        {
            $this->view->set('header', 'Информации не найдено');
            $this->view->generate('ErrorView.php' , 'TemplateView.php');
        }
        else
        {
            $this->view->set('book', $book);
            $this->view->generate('BookView.php' , 'TemplateView.php');
        }
    }
}