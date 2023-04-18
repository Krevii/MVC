<?php
    include("header.php");
?>
    <main>
        <section class="login">
            <div class="form">

                <!-- <div class="text-contain">
                    <h2 class="intro-header">JOIN THE ENERGY REVOLUTION</h2>
                </div> -->
                <div class="text-contain-active">
                    <div class="left-line">
                        <div class="intro-header">JOIN THE</div>
                        <div class="intro-header">game</div>
                        <div class="intro-header">REVOLUTION</div>

                    </div>
                </div>
                <form method="post" action="/registration">
                    <label>STAY UP TO DATE WITH OUR PROGRESS AND HOW YOU CAN SUPPORT US</label>
                    <input name="user_name" autocomplete="on" autofocus required placeholder="User name">
                    <input type="email" name="email" autocomplete="on" autofocus required placeholder="E-mail">
                    <input type="password" autocomplete="on" name="password" required placeholder="password">
                    <input type="submit" name="submit" value="Sing Up">
                    <p class="text-h3">Уже зарегистрированы? <a style="text-decoration: underline;" class="text-h3" href="/login">Войти</a></p>
                </form>
            </div>
        </section>
    </main>