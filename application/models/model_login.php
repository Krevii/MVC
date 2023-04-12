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

        // Ищем пользователя по имени пользователя и паролю
        $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Если пользователь найден, возвращаем true 
            return true;
        } else {
            // Если пользователь не найден, возвращаем false
            return false;
        }

        $conn->close();
    }

}
