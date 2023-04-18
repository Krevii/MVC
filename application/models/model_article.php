<?php
class Model_Article
{
    public function edit_article($data = null)
    {
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $article_id = $data;
        $title = $_POST['title'];
        $content = $_POST['content'];

        if ($article_id) {
            $stmt = mysqli_prepare($conn, "UPDATE articles SET title = ?, content = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, 'ssi', $title, $content, $article_id);
        }
        if (mysqli_stmt_execute($stmt)) {
            header('Location: /blogs/'. ($article_id ? $article_id : mysqli_insert_id($conn)) .'/view');
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    public function create_article($data = null)
    {

        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $article_id = $_POST['article_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        if ($article_id) {
            $stmt = mysqli_prepare($conn, "UPDATE articles SET title = ?, content = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, 'ssi', $title, $content, $article_id);
        } else {
            $stmt = mysqli_prepare($conn, "INSERT INTO articles (title, content) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, 'ss', $title, $content);
        }

        if (mysqli_stmt_execute($stmt)) {
            header('Location: /blogs/'. ($article_id ? $article_id : mysqli_insert_id($conn)) .'/view');
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    public function get_article($article_id)
    {
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM articles WHERE id = {$article_id}";
        $result = $conn->query($sql);

        if ($result->num_rows < 1) {
            Route::ErrorPage404();
        }
        
        mysqli_close($conn);
        
        return $result->fetch_assoc();

    }
}
