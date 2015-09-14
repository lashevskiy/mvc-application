<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.07.2015
 * Time: 22:41
 */

namespace MainAppSpace;

// подключаем файлы ядра
require_once BASE_PATH . D_CORE . 'Model.php';
require_once BASE_PATH . D_CORE . 'View.php';
require_once BASE_PATH . D_CORE . 'Controller.php';

/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/

require_once BASE_PATH . D_CORE . 'Route.php';
//Route::start();

new Route();