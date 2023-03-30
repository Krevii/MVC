<?php
class Controller_blogs extends Controller
{
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