<?php
class Controller_Main extends Controller
{
	function action_index($data = null)
	{
		// // Проверка, был ли отправлен POST-запрос
		// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
		// 	// Задайте имя папки для загрузки изображений
		// 	$target_dir = "userImage/";

		// 	// Убедитесь, что каталог загрузки существует
		// 	if (!file_exists($target_dir)) {
		// 		mkdir($target_dir, 0755, true);
		// 	}

		// 	// Создайте уникальное имя файла с расширением
		// 	$imageFileType = pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION);
		// 	$unique_image_name = time() . '_' . uniqid() . '.' . $imageFileType;

		// 	// Путь для загрузки файла
		// 	$target_file = $target_dir . $unique_image_name;

		// 	// Проверка и загрузка файла
		// 	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		// 		// Отправить JSON-ответ с информацией об изображении
		// 		$response = [
		// 			'location' => $target_file
		// 		];
		// 		echo json_encode($response);
		// 		return;
		// 	} else {
		// 		// Отправить ошибку, если файл не удалось загрузить
		// 		header("HTTP/1.1 500 Internal Server Error");
		// 		echo "Sorry, there was an error uploading your file.";
		// 	}
		// } else {
		// 	// Отправить ошибку, если запрос некорректен
		// 	header("HTTP/1.1 400 Bad Request");
		// 	echo "Invalid request.";
		// }

		$this->view->generate('main_view.php', 'template_view.php');
	}
}
