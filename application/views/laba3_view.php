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
        $products = array(
            array("name" => "RTX 3050", "price" => 180),
            array("name" => "RTX 3060", "price" => 220),
            array("name" => "RTX 3070", "price" => 300)
        );

        $max_product = $products[0]['name'];
        $max_price = $products[0]['price'];

        foreach ($products as $product) {
            if ($product['price'] > $max_price) {
                $max_product = $product['name'];
                $max_price = $product['price'];
            }
        }

        // if ($products[0]['price'] > $products[1]['price']) {
        //     $max_product = $products[0]['name'];
        //     $max_price = $products[0]['price'];
        // }
        // elseif ($products[0]['price'] > $products[2]['price']) {
        //     $max_product = $products[0]['name'];
        //     $max_price = $products[0]['price'];
        // }
        // elseif ($products[1]['price'] > $products[2]['price']) {
        //     $max_product = $products[1]['name'];
        //     $max_price = $products[1]['price'];
        // }
        // else{
        //     $max_product = $products[2]['name'];
        //     $max_price = $products[2]['price'];
        // }
        echo "<p>Самый дорогой товар: " . $max_product . " (цена: " . $max_price . ")</p>";

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

        foreach ($data as $day) {
            echo "<h3>" . $day['day'] . "</h3>";
            foreach ($day['lessons'] as $lesson) {
                if ($lesson['subject'] == "Информатика") {
                    echo "<p>Предмет: " . $lesson['subject'] . "</p>";
                    echo "<p>Преподаватель: " . $lesson['teacher'] . "</p>";
                    echo "<p>Время: " . $lesson['start_time'] . " - " . $lesson['end_time'] . "</p>";
                }
            }
        }

        echo "<br><strong>Задание 5</strong><br>";

        function get_string($str, $font_size)
        {
            return "<span style='font-size:{$font_size}px;'>" . $str . "</span><br>";
        }

        echo get_string("Hello World", 36);

        echo "<br><strong>Задание 6</strong><br>";
        ?>

        <form method="post" action="laba3">
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name"><br>

            <label for="age">Возраст:</label>
            <input name="age" id="age"><br>

            <label for="amount">Сумма заказа:</label>
            <input name="order" id="amount"><br>

            <input type="submit" value="Отправить">
        </form>

        <?php





        $name = $_POST["name"];
        $age = $_POST["age"];
        $order = $_POST["order"];
        if (!empty($name) && !empty($age) && !empty($order)) {
            echo "Здравствуйте, $name! Спасибо за заказ!";

            if ($order > 5000) {
                $discount = $order * 0.1;
                $final_price = $order - $discount;
                echo " Так как сумма вашего заказа превысила 5000 рублей, Вы получаете 10 %-ную скидку в размере $discount рублей. Сумма вашего заказа со скидкой: $final_price рублей.";
            }
        } else {
            echo "Пожалуйста, заполните все поля формы.";
        }
        

        ?>

    </section>
</main>