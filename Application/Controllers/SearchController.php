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
        parent::index();
        $this->view->set('books', $this->model->searchBooks());
        $this->view->generate('SearchView.php', 'TemplateView.php');
    }
}