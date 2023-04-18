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
        if (!empty($_POST["email"]) && !empty($_POST["password"]) && isset($_POST["submit"])) {
            $data = array(
                "email" => "{$_POST['email']}",
                "password" => "{$_POST['password']}"
            );
    
            $this->model->authorize_user($data);

        }
        
        $this->view->generate('login_view.php', 'template_view.php');
    }
    
}
?>