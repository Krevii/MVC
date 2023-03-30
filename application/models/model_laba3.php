<?php
class Model_laba3 extends Model
{
    public function get_data()
    {
        return array(
            array(
                "day" => "Понедельник", "num_lessons" => 4,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:30", "subject" => "Информатика", "teacher" => "Куликов"),
                    array("start_time" => "10:40", "end_time" => "12:10", "subject" => "Математика", "teacher" => "Петров"),
                    array("start_time" => "13:00", "end_time" => "14:30", "subject" => "Физика", "teacher" => "Сидоров"),
                    array("start_time" => "14:40", "end_time" => "16:10", "subject" => "Химия", "teacher" => "Козлова")
                )
            ),
            array(
                "day" => "Вторник", "num_lessons" => 3,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:30", "subject" => "Физкультура", "teacher" => "Иванова"),
                    array("start_time" => "10:40", "end_time" => "12:10", "subject" => "Информатика", "teacher" => "Куликов"),
                    array("start_time" => "13:00", "end_time" => "14:30", "subject" => "История", "teacher" => "Петрова")
                )
            ),
            array(
                "day" => "Среда", "num_lessons" => 2,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:30", "subject" => "Информатика", "teacher" => "Куликов"),
                    array("start_time" => "10:40", "end_time" => "12:10", "subject" => "Русский язык", "teacher" => "Иванова")
                )
            ),
            array(
                "day" => "Четверг", "num_lessons" => 3,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:30", "subject" => "Информатика", "teacher" => "Куликов"),
                    array("start_time" => "10:40", "end_time" => "12:10", "subject" => "Физика", "teacher" => "Иванов"),
                    array("start_time" => "13:00", "end_time" => "14:30", "subject" => "Химия", "teacher" => "Сидоров")
                )
            ),
            array(
                "day" => "Пятница", "num_lessons" => 2,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:30", "subject" => "История", "teacher" => "Ковалев"),
                    array("start_time " => "10:30","end_time" => "12:10", "subject" => "Математика", "teacher" => "Иванов")
                )
            ),
            array(
                "day" => "Суббота", "num_lessons" => 1,
                "lessons" => array(
                    array("start_time" => "09:00", "end_time" => "10:30", "subject" => "Физкультура", "teacher" => "Петров")
                )
            )
        );
    }
}
