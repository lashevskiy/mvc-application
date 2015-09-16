<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 26.07.2015
 * Time: 19:13
 */

namespace MainAppSpace;

    defined('INDEX_ACCESS_ALLOWED') or die('Restricted Access');

    // Debugging tool
    error_reporting(E_ALL);

    // Root project path
    define('BASE_PATH', dirname(realpath(__DIR__)) . '/');
    define('DS', DIRECTORY_SEPARATOR);
    define('D_MODEL', 'Application/Models/');
    define('D_VIEW', 'Application/Views/');
    define('D_CONTROLLER', 'Application/Controllers/');
    define('D_TEMPLATE', 'Application/Templates/');
    define('D_CORE', 'Application/Core/');
    define('D_CONFIG', 'Config/');
    define('D_IMAGES', 'Images/');
