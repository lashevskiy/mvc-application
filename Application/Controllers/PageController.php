<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 26.07.2015
 * Time: 19:45
 */

namespace MainAppSpace;
require_once BASE_PATH . D_MODEL . 'PageModel.php';

class PageController
{
    function GetMenu()
    {
        $pageModel = new PageModel();
        $menuItems = array();
        $menuItems = $pageModel->GetMenuFromDatabase();
        return $menuItems;
    }
}