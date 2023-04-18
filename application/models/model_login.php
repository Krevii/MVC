<?php
class Model_Login extends Model
{
    public function authorize_user($data)
    {
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Экранируем значения полей и заключаем их в кавычки
        $email = $conn->real_escape_string($data['email']);
        $password = $conn->real_escape_string($data['password']);

        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = $conn->query($sql); 

        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();

            if (password_verify($password, $userData["password"])) {
                session_start();
                
                include "./application/core/user.php";
                $user = new User($userData);
                $_SESSION["user"] = serialize($user);
                $_SESSION["a"] = "testtest";
                
                $user = unserialize($_SESSION["user"]);
                echo $user->getId();
                header("Location: /");

                return true;
            } else {
                // Если пользователь не найден, возвращаем false
                echo "Неправильное имя пользователя или пароль.";
                return false;
            }
        }

        $conn->close();
    }
}
