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
    public function category($category = null)
    {
        /*parent::index();*/
        /*var_dump($_SESSION);*/
        $books = $this->model->getBooks($category);

        if(empty($books))
        {
            parent::index();
            $this->view->set('header', 'Информации не найдено');
            $this->view->generate('ErrorView.php' , 'TemplateView.php');
        }
        else
        {
            parent::index();

            $categoryName = $this->model->getCategoryName($category);
            $this->view->set('header', $categoryName[0]['sName']);
            $this->view->set('books', $books);


            $url = trim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);


            $this->view->generate('BooksView.php' , 'TemplateView.php');
        }
    }


    public function addBook()
    {

    }
}