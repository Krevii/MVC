<?php
class Controller_Blogs extends Controller
{
    function __construct()
	{
		$this->view = new View();
        $this->model = new Model_Blogs();
	}
    function action_index()
    {
        $data = $this->model->get_blogs()['name'];
        $this->view->generate("blogs_view.php", "template_view.php", $data);
    }
    function action_getForum()
    {

        $this->view->generate("blogs_view.php", "template_view.php");
    }
}
?>