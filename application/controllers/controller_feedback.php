<?php
class Controller_Feedback extends Controller
{

	function __construct()
	{
		$this->model = new Model_Feedback();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('feedback_view.php', 'template_view.php', $data);
	}
	function action_setUser()
	{
		$data = $_GET["pass"];
		echo $data;
		
		$this->view->generate('feedback_view.php', 'template_view.php', $data);
	}
	function action_getUsers($request = null)
	{
		$conn = new mysqli("127.0.0.1", "root", "", "virtups");
		$data = "asda";
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT * FROM users"; 
		$result = $conn->query($sql);

		foreach($result as $row){
			$data = $row["login"];
		}
		// $data = $this->model->getUsers();
		// $keyValue = explode("&", $request);
		// $data = explode("=", $keyValue[0]);
		
		$this->view->generate('feedback_view.php', 'template_view.php', $data);
	}	
} 
?>
