<?php
class Model_Article
{
    public function edit_article($data = null)
    {
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        

        if ((isset($_FILES['preview']["name"]) && $_FILES['preview']['size'] > 0)) {
            
            $target_dir = "userImage/";
            // Получите расширение файла
            $imageFileType = pathinfo(basename($_FILES["preview"]["name"]), PATHINFO_EXTENSION);
            // Создайте уникальное имя файла с расширением
            $unique_image_name = time() . '_' . uniqid() . '.' . $imageFileType;
            // Путь для загрузки файла
            $target_file = $target_dir . $unique_image_name;
            
            if ($imageFileType != "jpg" && $imageFileType != "png") {
                echo "Sorry, only JPG and PNG files are allowed.";
                return;
            }
            
            if (move_uploaded_file($_FILES["preview"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars($unique_image_name) . " has been uploaded.";
                unlink($conn->query("SELECT preview FROM articles WHERE id = {$data}")->fetch_assoc()['preview']);

            }
        }
        else{
            $target_file = $conn->query("SELECT preview FROM articles WHERE id = {$data}")->fetch_assoc()['preview']; 
        }

        $article_id = $data;
        $title = $_POST['title'];
        $content = $_POST['content'];
        $preview = $target_file;

        $stmt = mysqli_prepare($conn, "UPDATE articles SET title = ?, content = ?, preview = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'sssi', $title, $content, $preview, $article_id);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: /blogs/' . ($article_id ? $article_id : mysqli_insert_id($conn)) . '/view');
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

        session_start();
        include "./application/core/user.php";
        $user = unserialize($_SESSION['user']);

        if (isset($_FILES['preview']["name"]) && $_FILES['preview']['size'] > 0) {
            $target_dir = "userImage/";
            // Получите расширение файла
            $imageFileType = pathinfo(basename($_FILES["preview"]["name"]), PATHINFO_EXTENSION);
            // Создайте уникальное имя файла с расширением
            $unique_image_name = time() . '_' . uniqid() . '.' . $imageFileType;
            // Путь для загрузки файла
            $target_file = $target_dir . $unique_image_name;
            
            if ($imageFileType != "jpg" && $imageFileType != "png") {
                echo "Sorry, only JPG and PNG files are allowed.";
                return;
            }
            
            if (move_uploaded_file($_FILES["preview"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars($unique_image_name) . " has been uploaded.";
    
            }
            
        }
        else{
            $target_file = "userImage/sticker-shocked.png";
            
        }

        $article_id = $_POST['article_id'];
        $idAuthor = $user->getId();
        $title = $_POST['title'];
        $content = $_POST['content'];
        $preview = $target_file;

        $stmt = mysqli_prepare($conn, "INSERT INTO articles (idAuthor, title, content, preview) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'isss', $idAuthor, $title, $content, $preview);

        if (mysqli_stmt_execute($stmt)) {
            header('Location: /blogs/' . ($article_id ? $article_id : mysqli_insert_id($conn)) . '/view');
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
    public function delete_article($data)
    {
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        unlink($conn->query("SELECT preview FROM articles WHERE id = {$data}")->fetch_assoc()['preview']);
        $sql = "DELETE FROM articles WHERE id = {$data}";
        $result = $conn->query($sql);
        header('Location: /blogs');
        mysqli_close($conn);
        return $result;
    }
}
