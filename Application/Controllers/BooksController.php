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
    public function index($argv = null)
    {
        $books = $this->model->getData($argv);

        if(empty($books))
        {
            $this->view->generate('ErrorBookView.php' , 'TemplateView.php');
        }
        else
        {
            $this->view->set('books', $books);
            $this->view->generate('BooksView.php' , 'TemplateView.php');
        }
    }
}