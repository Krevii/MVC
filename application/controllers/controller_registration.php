<?php
class Controller_Registration extends Controller
{
    function __construct()
	{
		$this->view = new View();
        $this->model = new Model_Registration();
	}
	function action_index($data = null)
	{	
        
		$this->view->generate('registration_view.php', 'template_view.php', $data);
	}
    function action_registration($data = null)
    {
        if (!empty($_POST["user_name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && isset($_POST["submit"])) {
            $data = array(
                "user_name" => "{$_POST['user_name']}",
                "email" => "{$_POST['email']}",
                "password" => "{$_POST['password']}",
                "role" => "user"

            );
            
            $this->model->register_user($data);
                
        }
        else{
            echo "Не все поля заполнены";
        }

        
        $this->view->generate('registration_view.php', 'template_view.php');
    }
}
?>