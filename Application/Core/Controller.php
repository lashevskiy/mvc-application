<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.07.2015
 * Time: 22:21
 */

namespace MainAppSpace;


class Controller
{
    public $model;
	public $view;
	protected $controller;
	protected $viewName;

	function __construct($controller)
	{
		$this->controller = ucwords($controller);
		$this->viewName = $this->controller . 'View.php';

		if (file_exists(BASE_PATH . D_MODEL . ucwords($this->controller) . 'Model' . '.php'))
		{
			$modelName = __NAMESPACE__ . DS . ucwords($this->controller) . 'Model';
			$this->model = new $modelName();
		}

		$this->view = new View();
	}

	// действие (action), вызываемое по умолчанию
	function index()
	{
		// todo
	}
}
