<main style="color: #fff; font-size: 28px;">
    <section>
        <?php
        echo "<strong>Задание 1</strong><br>";
        $age = 60; // произвольное числовое значение

        if ($age >= 18 && $age <= 59) {
            echo "Вам ещё работать и работать";
        } elseif ($age > 59) {
            echo "Вам пора на пенсию";
        } elseif ($age >= 1 && $age <= 17) {
            echo "Вам ещё рано работать";
        } else {
            echo "Неизвестный возраст";
        }


        echo "<br><strong>Задание 2</strong><br>";
        $product1 = "Товар 1";
        $product2 = "Товар 2";
        $product3 = "Товар 3";
        $price1 = 100;
        $price2 = 200;
        $price3 = 150;

        if ($price1 > $price2 && $price1 > $price3) {
            $max_product = $product1;
            $max_price = $price1;
        } elseif ($price2 > $price3) {
            $max_product = $product2;
            $max_price = $price2;
        } else {
            $max_product = $product3;
            $max_price = $price3;
        }

        echo "Самый дорогой товар: " . $max_product . " по цене " . $max_price;

        echo "<br><strong>Задание 3</strong><br>";

        $n = 2;
        $max_num = pow(10, $n);
        $max_num = $max_num;
        for ($i = 0; $i <= $max_num; $i++) {
            if ($i % 2 != 0) {
                echo $i . " ";
            }
        }
          
        echo "<br><strong>Задание 4</strong><br>";
        foreach ($schedule as $day) {
            for ($i = 0; $i < $day['lessons']; $i++) {
              if ($day['subject'][$i] == 'Информатика') {
                echo "День: " . $day['day'] . "<br>";
                echo "Время: " . $day['time'][$i] . "<br>";
                echo "Предмет: " . $day['subject'][$i] . "<br>";
                echo "Преподаватель: " . $day['teacher'][$i] . "<br><br>";
              }
            }
          }
        ?>
    </section>
</main>