<?php
class Model_laba3 extends Model{
    public function get_data()
    {
        return array(
            array( // Понедельник
                "num_lessons" => 4,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:20", "subject" => "Информатика", "teacher" => "Иванов"),
                    array("start_time" => "10:30", "end_time" => "11:50", "subject" => "Математика", "teacher" => "Петров"),
                    array("start_time" => "12:00", "end_time" => "13:20", "subject" => "Иностранный язык", "teacher" => "Сидоров"),
                    array("start_time" => "14:00", "end_time" => "15:20", "subject" => "Физика", "teacher" => "Козлов")
                )
            ),
            array( // Вторник
                "num_lessons" => 3,
                "lessons" => array(
                    array("start_time" => "10:00", "end_time" => "11:20", "subject" => "Химия", "teacher" => "Смирнов"),
                    array("start_time" => "11:30", "end_time" => "12:50", "subject" => "Физкультура", "teacher" => "Новиков"),
                    array("start_time" => "14:00", "end_time" => "15:20", "subject" => "Информатика", "teacher" => "Иванов")
                )
            ),
            array( // Среда
                "num_lessons" => 2,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:20", "subject" => "Математика", "teacher" => "Петров"),
                    array("start_time" => "10:30", "end_time" => "11:50", "subject" => "Иностранный язык", "teacher" => "Сидоров")
                )
            ),
            array( // Четверг
                "num_lessons" => 2,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:20", "subject" => "Математика", "teacher" => "Петров"),
                    array("start_time" => "10:30", "end_time" => "11:50", "subject" => "Иностранный язык", "teacher" => "Сидоров")
                )
            )
            
        );
    }
}
?>