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
    public function index($argv = null)
    {
        $book = $this->model->getData($argv);

        if(empty($book))
        {
            $this->view->generate('ErrorBookView.php' , 'TemplateView.php');
        }
        else
        {
            $this->view->set('book', $book);
            $this->view->generate('BookView.php' , 'TemplateView.php');
        }
    }
}