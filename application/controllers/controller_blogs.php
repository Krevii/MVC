<?php
class Controller_Blogs extends Controller
{
    function __construct()
	{
		$this->view = new View();
	}
    function action_index()
    {
        $this->view->generate("blogs_view.php", "template_view.php");
    }
    function action_getForum()
    {
        $this->view->generate("blogs_view.php", "template_view.php");
    }
}
?>