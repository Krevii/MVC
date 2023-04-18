<?php
class Controller_Article extends Controller
{
    function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Article();
    }

    function action_index($articleId = null)
    {
        $data = null;
        if ($articleId != null) {
            $result = $this->model->get_article($articleId);

            $data = "<h1>{$result['title']}</h1>{$result['content']}";
        }

        $this->view->generate("article_view.php", "template_view.php", $data);
    }
    function action_create()
    {
        if (empty($_SESSION['user'])) {
            header("Location: /login");
        }

        $user = unserialize($_SESSION['user']);

        if (isset($_POST['article_id'])) {
            $this->model->create_article();
        }

        $data = "<form action='/blogs/create' method='post' class='content-form'>
            <input type='hidden' name='article_id'>
            <input type='text' name='title' placeholder='Заголовок статьи''>
            <textarea name='content' id='content'></textarea>
            <button type='submit'>Сохранить</button></form>";
        header('Set-Cookie: cookie_name=cookie_value; SameSite=Lax');

        $this->view->generate("article_view.php", "template_view.php", $data);
    }
    function action_edit($articleId = null)
    {
        session_start();
        if (empty($_SESSION['user'])) {
            header("Location: /login");
            return;
        }
        
        include "./application/core/user.php";
        $user = unserialize($_SESSION['user']);

        if (isset($articleId) && $user->getId() == 6 && isset($_POST["title"]) && isset($_POST["content"])) {
            $this->model->edit_article($articleId);
            
        }

        $result = $this->model->get_article($articleId);
        $content = $result['content'];
        $title = $result['title'];


        $data = "<form action='/blogs/{$articleId}/edit' method='post' class='content-form'>
        <input type='hidden' name='article_id'>
        <input type='text' name='title' placeholder='Заголовок статьи' value='$title' '>
        <textarea name='content' id='content'>" . $content . "</textarea>
        <button type='submit'>Сохранить</button></form>";
        header('Set-Cookie: cookie_name=cookie_value; SameSite=Lax');

        $this->view->generate("article_view.php", "template_view.php", $data);
    }
}
