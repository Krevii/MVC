<?php
class Controller_laba3 extends Controller{
    
    function __construct()
	{
        $this->model = new Model_laba3();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();
		
        $this->view->generate("laba3_view.php","template_view.php", $data);
	}
} 

?>