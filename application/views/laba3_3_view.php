<main style="color: #fff; font-size: 28px;">
    <section>
        <form method="post" action="laba3_3">
            <label>средняя зарплата:</label>
            <input name="salary">

            <label>Содержит строку :</label>
            <input name="contain_str">

            <label>Название садика:</label>
            <input name="name">

            <input type="submit" value="Отправить">
        </form>
        <?php

        try{
            echo "Средняя зарплата:<br>";
            while ($row = $data["get_salary"]->fetch_assoc()) {
                echo $row['name'] . ' - ' . $row['avg_salary'] . '<br>';
            }

            echo "<br>Содержит строку :<br>";
            while ($row = $data["get_like_name"]->fetch_assoc()) {
                echo $row['name'] . ' - ' . $row['avg_salary'] . '<br>';
            }
            
            echo "<br>Cадик ";
            $row = $data["get_count_for_name"]->fetch_assoc();
            echo "{$row["name"]}<br>";
            echo 'Количество работников: ' . $row['num_of_workers'] . '<br>';
            echo 'Количество детей: ' . $row['num_of_children'];
        }
        catch(Throwable $e){
            echo "Данные не найдены ". $e->getMessage();
        }
        ?>
    </section>
</main>