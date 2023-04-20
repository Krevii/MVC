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
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $search = null;
        if (isset($_POST["search"])) {
            $search = $_POST["search"];
        }

        $rows = $this->model->get_blogs($search);
        $data = array();

        foreach ($rows as $row) {

            $sql = "SELECT user_name FROM users where id = {$row['idAuthor']}";
            $result = $conn->query($sql);

            array_push(
                $data,

                "<a href='./blogs/{$row['id']}/view' class='forum-block'>
            
                <div class='forum-content-preview'>
                    <img class='preview-img' src='{$row['preview']}' alt='preview'>
                </div>
                <div class='forum-header'>
                    <span class='forum-header-author'>{$result->fetch_assoc()['user_name']}</span>
                    <span class='forum-header-date'>{$row['created_at']}</span>
                    <span class='forum-header-title'>{$row['title']}</span>
                </div>

                <div class='forum-footer'>
                    <div class='forum-footer-view'>
                        <simg class='social-icon' src='../../image/like.png' alt='social-icon'>
                        <span></span>
                    </div>
                    <div class='forum-footer-like'>
                        <simg class='social-icon' src='../../image/eye.png' alt='social-icon'>
                        <span></span>
                    </div>
                </div>
            </a>"
            );
        }
        $this->view->generate("blogs_view.php", "template_view.php", $data);
    }
}
