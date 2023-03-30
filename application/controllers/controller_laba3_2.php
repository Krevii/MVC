<?php
class Controller_laba3_2 extends Controller{
    
    function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		
        $this->view->generate("laba3_2_view.php","template_view.php");
	}
} 

?>