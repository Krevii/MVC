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
        session_start();
        if (empty($_SESSION['user'])) {
            header("Location: /login");
            return;
        }

        $conn = new mysqli("127.0.0.1", "root", "", "virtups");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT idAuthor from articles where id = '$articleId'";
        $authorID = $conn->query($sql)->fetch_assoc();
        
        include "./application/core/user.php";
        $user = unserialize($_SESSION['user']);
        $adminTool = null;
        if ($user->getId() == $authorID['idAuthor'] || $user->getRole() == 'root') {
            $adminTool = "
            <a href='./edit' class='root-edit-icon'>
                <img class='edit-icon' src='../../image/edit.png' alt='edit-icon'>
            </a>
            <a href='./delete' class='root-edit-icon'>
                <img class='edit-icon' src='../../image/trash.png' alt='delete-icon'>
            </a>";
        }

        $data = null;

        if ($articleId != null) {
            $result = $this->model->get_article($articleId);

            $data = "{$adminTool}<h1>{$result['title']}</h1><h4>Дата: {$result['created_at']}</h4><br>{$result['content']}";
        }
        
        $this->view->generate("article_view.php", "template_view.php", $data);
    }
    function action_create($articleId = null)
    {
        session_start();
        if (empty($_SESSION['user'])) {
            header("Location: /login");
            return;
        }

        if (isset($_POST["title"]) && isset($_POST["content"])) {;
            $this->model->create_article();

        }

        $data = "<form action='/blogs/create' method='post' enctype='multipart/form-data' class='content-form'>
            <input type='hidden' name='article_id'>
            <input type='text' name='title' placeholder='Заголовок статьи'>
            <input type='file' name='preview' id='preview' accept='.jpg, .png'>
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

        $conn = new mysqli("127.0.0.1", "root", "", "virtups");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT idAuthor from articles where id = '$articleId'";
        $authorID = $conn->query($sql)->fetch_assoc();

        if ($user->getId() == $authorID['idAuthor'] || $user->getRole() == 'root') {

            if (isset($_POST["title"]) && isset($_POST["content"])) {

                $this->model->edit_article($articleId);
            }
        }
        else{

            Route::ErrorPage404();
            return;
        }


        $result = $this->model->get_article($articleId);
        $content = $result['content'];
        $title = $result['title'];
        

        $data = "<form action='/blogs/{$articleId}/edit' method='post' enctype='multipart/form-data' class='content-form'>
        <input type='hidden' name='article_id'>
        <input type='text' name='title' placeholder='Заголовок статьи' value='$title' '>
        <input type='file' name='preview' id='preview' accept='.jpg, .png'>
        <textarea name='content' id='content'>" . $content . "</textarea>
        <button type='submit'>Сохранить</button></form>";
        header('Set-Cookie: cookie_name=cookie_value; SameSite=Lax');

        $this->view->generate("article_view.php", "template_view.php", $data);

        mysqli_close($conn);
    }
    function action_delete($articleId = null)
    {
        session_start();
        if (empty($_SESSION['user'])) {
            header("Location: /login");
            return;
        }

        include "./application/core/user.php";
        $user = unserialize($_SESSION['user']);

        $conn = new mysqli("127.0.0.1", "root", "", "virtups");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT idAuthor from articles where id = '$articleId'";
        $authorID = $conn->query($sql)->fetch_assoc();

        if ($user->getId() == $authorID['idAuthor'] || $user->getRole() == 'root') {

            $this->model->delete_article($articleId);
        }
        else{

            Route::ErrorPage404();
            return;
        }
        
    }
}
