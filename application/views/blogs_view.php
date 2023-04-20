<?php
require_once './application/views/header.php';

?>
<main class="forum-root">
    <section class="search-block">

        <div class="custom-block">
            <div class="search-bar">
                <form action="/blogs" method="POST">
                    <input type="text" placeholder="Поиск" name="search" class="search-input" />
                    <input type="submit" value="Send">
                </form>
                
                <!-- <button class="search-button">Поиск</button> -->
                <a href="blogs/create" class="new-article-button">Создать</a>
            </div>
            <div class="sort-dropdown">
                <!-- <button class="sort-button">Сортировка</button>
                <div class="sort-options">
                    <a href="#">По дате</a>
                    <a href="#">По заголовку</a>
                    <a href="#">По автору</a>
                </div> -->
            </div>
        </div>

        <!-- <button id="sort-button" class="sort-button" onclick="toggleMenu()">Сортировка</button>
        <ul id="sort-menu" class="sort-menu">
            <li><a href="#" onclick="sortCards('name')">По названию</a></li>
            <li><a href="#" onclick="sortCards('price')">По цене</a></li>
            <li><a href="#" onclick="sortCards('date')">По дате</a></li>
        </ul> -->

    </section>
    <section class="forum-place">
        <?php
        foreach ($data as $blog) {
            echo $blog;
        }
        ?>
    </section>
</main>