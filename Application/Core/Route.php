<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.07.2015
 * Time: 22:22
 */

namespace MainAppSpace;

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{
	// контроллер и действие по умолчанию
	protected $controller = 'Default';
	protected $action = 'index';
	protected $namespace = __NAMESPACE__;
	protected $argv = array();

	public function __construct()
	{
		$url = explode('/', $_SERVER['REQUEST_URI']);
		unset($url[0]);

		if (isset($url[1]) and file_exists(BASE_PATH . D_CONTROLLER . $url[1] . 'Controller' . '.php'))
		{
			$this->controller = $url[1];
			unset($url[1]);
		}

		// Модель
		$modelName = ucwords(strtolower($this->controller)) . 'Model';
		$modelPath = BASE_PATH . D_MODEL . $modelName . '.php';
		if(file_exists($modelPath))
		{
			require_once BASE_PATH . D_MODEL . $modelName . '.php';
		}

		// Контроллер
		$controllerName = ucwords(strtolower($this->controller)) . 'Controller';
		$controllerPath = BASE_PATH . D_CONTROLLER . $controllerName . '.php';
		/*$this->controller = $controllerName;*/
		if(file_exists($controllerPath))
		{
			require_once BASE_PATH . D_CONTROLLER . $controllerName . '.php';
		}
		else
		{
			Route::ErrorPage404();
		}


		//echo "Model: $modelName <br>";
		//echo "Controller: $controllerName <br>";
		//echo "Action: $this->action <br>";


		// Создаем контроллер (объект контроллер)
		$controllerName = $this->namespace . DS . $controllerName;
        $this->controller = new $controllerName($this->controller);

		// Метод
		if (isset($url[2]))
		{
			if(method_exists($this->controller, $url[2]))
			{
				$this->action = $url[2];
				unset($url[2]);
			}
		}

		if(method_exists($this->controller, $this->action))
		{
			// вызываем действие контроллера
			/*$action = $this->action;*/
			/*$this->controller->$action();*/
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}

		$this->argv = $url ? array_values($url) : [];

		/*var_dump($this->argv);*/
		call_user_func_array([$this->controller, $this->action], $this->argv);
	}

	function ErrorPage404()
	{
        $host = 'http://' . $_SERVER['HTTP_HOST']. '/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:' . $host . '404');
    }
}