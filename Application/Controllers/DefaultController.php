<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.07.2015
 * Time: 22:26
 */

namespace MainAppSpace;


class DefaultController extends Controller
{
    function index()
    {
        $contentArray = array();
        $titleArray = array();

        $books = $this->model->getDataRandom();
        array_push($contentArray, $books);
        array_push($titleArray, 'Рекомендуем');
        $this->view->set('booksRandom', $books);
        $books = $this->model->getData('price');
        array_push($contentArray, $books);
        array_push($titleArray, 'Лучшая цена');
        $this->view->set('booksOrderByPrice', $books);
        $books = $this->model->getData('releaseDate');
        array_push($contentArray, $books);
        array_push($titleArray, 'Новинки');
        $this->view->set('booksOrderByReleaseDate', $books);
        $books = $this->model->getData('orderCount DESC');
        array_push($contentArray, $books);
        array_push($titleArray, 'Хиты продаж');
        $this->view->set('booksOrderByOrderCount', $books);

        $this->view->set('contentArray', $contentArray);
        $this->view->set('titleArray', $titleArray);

        $this->view->generate('DefaultView.php' , 'TemplateView.php');
    }
}
