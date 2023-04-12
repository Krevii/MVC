<?php
class Controller_Login extends Controller
{
    function __construct()
	{
		$this->view = new View();
        $this->model = new Model_Login();
	}
	function action_index($data = null)
	{	
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
    public function action_login()
    {
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            $data = array(
                "email" => "{$_POST['email']}",
                "password" => "{$_POST['password']}"
            );
    
            if ($this->model->authorize_user($data)) {
                // Если пользователь найден, создаем сессию и перенаправляем на другую страницу
                session_start();
                $_SESSION["email"] = $data["email"];
                //$_SESSION["role"] = $data["role"];
                
                header("Location: index.php");
                exit();
            } else {
                // Если пользователь не найден, выводим сообщение об ошибке
                echo "Неправильное имя пользователя или пароль.";
            }
        }
    
        $this->view->generate('login_view.php', 'template_view.php');
    }
    
}
?>