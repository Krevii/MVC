<?php
class Controller_laba3 extends Controller{
    
    function __construct()
	{
		$this->view = new View();
        $this->model = new Model();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
        $this->view->generate("laba3_view.php","template_view.php", $data);
	}
} 

?>