<main style="color: #fff; font-size: 28px;">
    <section>
        <form method="post" action="laba3_2">
            <label for="amount">Предпологаемое число:</label>
            <input name="magic_number"><br>

            <input type="submit" value="Отправить">
        </form>
        <?php
        echo "<br><strong>Задание 7</strong><br>";
        echo "Угадайте число от 1 до 100<br>";
        
        if (empty($_COOKIE["magic_number"])) {
            $number = rand(1, 100);
            setcookie("magic_number", $number);
        }
        if ($_COOKIE["magic_number"] > $_POST["magic_number"]) {
            echo "Ваше число меньше загаданного";
        }
        elseif($_COOKIE["magic_number"] < $_POST["magic_number"]){
            echo "Ваше число больше загаданного";
        }
        else{
            echo "Вы угадали";
            $number = rand(1, 100);
            setcookie("magic_number", $number);
        }
        
        ?>
    </section>
</main>