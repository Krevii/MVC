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
                <form method="post" action="/login">
                    <label>STAY UP TO DATE WITH OUR PROGRESS AND HOW YOU CAN SUPPORT US</label>
        
                    <input type="email" name="email" autocomplete="on" autofocus required placeholder="E-mail">
                    <input type="password" autocomplete="on" name="password" required placeholder="password">
                    <input type="submit" name="submit" value="Sing In">
                    <p class="text-h3">Нет аккаунта? <a style="text-decoration: underline;" class="text-h3" href="/registration">Зарегистрироваться</a></p>
                </form>
            </div>
        </section>
    </main>