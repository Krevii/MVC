<?php

class Route
{
	// Массив с маршрутами
	private $routes = [];

	// Добавление маршрута
	public function addRoute($url, $action)
	{
		$this->routes[$url] = $action;
	}
	// Обработка запроса
	public function dispatch($url)
	{
		// Поиск соответствующего маршрута
		foreach ($this->routes as $routeUrl => $action_name) {
			// Проверка соответствия URL маршруту

			//используем функцию preg_replace_callback, которая заменяет каждый параметр, 
			//заключенный в фигурные скобки {}, на соответствующую подмаску регулярного выражения
			$regex = preg_replace_callback('#\{([^{}]+)\}#', function($matches) {
				return '(?P<' . $matches[1] . '>[^/]+)';
			  }, $routeUrl);
			
			// Выполняем поиск по регулярному выражению
			if (preg_match("#^$regex$#", $url, $matches)) {
				// Вызов соответствующего контроллера и метода
				//echo "{$matches["id"]}<br>";//Вывод id которое мы получили через слеш

				$action_name = explode('@', $action_name);
				$controller_name = $action_name[0];
				$methodName = 'action_'.$action_name[1];

				//получаем имя контролера и модели
				$model_name = 'Model_' . $controller_name;
				$controller_name = 'Controller_' . $controller_name;
				
				//подцепляем файл с классом модели
				$model_file = strtolower($model_name) . '.php';
				$model_path = "application/models/" . $model_file;
				if (file_exists($model_path)) {
					include "application/models/" . $model_file;
				}

				// подцепляем файл с классом контроллера
				$controller_file = strtolower($controller_name) . '.php';
				$controller_path = "application/controllers/" . $controller_file;

				//echo "controller_path: {$controller_path}<br>controller_name: {$controller_name}<br>methodName: {$methodName}<br>matches: {$matches["id"]}<br>";
				if (file_exists($controller_path)) {
					include "application/controllers/" . $controller_file;
				} 
				else {
					/*
            			правильно было бы кинуть здесь исключение,
            			но для упрощения сразу сделаем редирект на страницу 404
           			*/
					Route::ErrorPage404();
				}

				if (empty($matches["id"])) {
					$matches["id"] = -1;
				}
				$controller = new $controller_name();
				$controller->$methodName($matches["id"]);
				return;
			}
		}


		Route::ErrorPage404();
		// Вывод страницы ошибки 404
		//header("HTTP/1.0 404 Not Found");
		//echo "Page not found";
	}

	static function ErrorPage404()
	{
		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:' . $host . '404');
	}
}
