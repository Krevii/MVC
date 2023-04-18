<?php
class Model_Registration extends Model
{
    public function register_user($data)
    {
        $conn = new mysqli("127.0.0.1", "root", "", "virtups");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Экранируем значения полей и заключаем их в кавычки
        $user_name = $conn->real_escape_string($data['user_name']);
        $email = $conn->real_escape_string($data['email']);
        $password =  $conn->real_escape_string($data['password']);
        $role = $conn->real_escape_string($data['role']);

        // Проверяем, есть ли пользователь с таким именем или адресом электронной почты
        $existing_user_sql = "SELECT * FROM users WHERE user_name = '{$user_name}' OR email = '{$email}'";
        $existing_user_result = $conn->query($existing_user_sql);

        if ($existing_user_result->num_rows > 0) {
            // Пользователь уже существует
            echo "Пользователь с таким именем или адресом электронной почты уже существует.";
        } else {
            // Пользователя не существует, добавляем его в базу данных
            $hashed_password = password_hash($password, PASSWORD_ARGON2I);
            $insert_user_sql = "INSERT INTO users(user_name, email, password, role) VALUES ('{$user_name}', '{$email}', '{$hashed_password}', '{$role}')";

            if ($conn->query($insert_user_sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
}
