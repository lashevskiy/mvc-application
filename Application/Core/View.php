<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.07.2015
 * Time: 22:22
 */

namespace MainAppSpace;
use Exception;

class View
{

	protected $file;
	protected $data = array();

	public function __construct()
	{

	}

	public function set($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function get($key)
	{
		return $this->data[$key];
	}


	//public $template_view; // здесь можно указать общий вид по умолчанию.

	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, $templateView, $data = null)
	{

		/*
		if(is_array($data)) {

			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		extract($this->data);
		ob_start();
		$output = ob_get_contents();
		ob_end_clean();

		/*
		динамически подключаем общий шаблон (вид),
		внутри которого будет встраиваться вид
		для отображения контента конкретной страницы.
		*/
		include D_TEMPLATE . $templateView;

		return $output;
	}
}