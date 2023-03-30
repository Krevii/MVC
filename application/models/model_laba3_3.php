<?php
class Model_laba3_3 extends Model
{

    public function get_data()
    {
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'kindergarten');
        // $mysqli = new mysqli('localhost', 'root', '', 'kindergarten');
        if ($mysqli->connect_error) {
            die('Ошибка подключения: ' . $mysqli->connect_error);
        }

        return array(
            "get_salary" => $mysqli->query("SELECT * FROM kindergartens WHERE avg_salary < $_POST[salary]"),
            "get_like_name" => $mysqli->query("SELECT * FROM kindergartens WHERE name LIKE '%$_POST[contain_str]%'"),
            "get_count_for_name" => $mysqli->query("SELECT name, num_of_workers, num_of_children FROM kindergartens WHERE name LIKE '%$_POST[name]%'")
        );

        $mysqli->close();
    }
}
