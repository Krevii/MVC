<?php
require_once './application/views/header.php'
?>
<main class="forum-root">
    <section class="search-block">
        <button id="sort-button" class="sort-button" onclick="toggleMenu()">Сортировка</button>
        <ul id="sort-menu" class="sort-menu">
            <li><a href="#" onclick="sortCards('name')">По названию</a></li>
            <li><a href="#" onclick="sortCards('price')">По цене</a></li>
            <li><a href="#" onclick="sortCards('date')">По дате</a></li>
        </ul>

    </section>
    <section class="forum-place">
        <?php
            
        ?>
        <div class="forum-block">
            <div class="forum-content-preview">

                <img class="preview-img" src="../../image/sticker-relaxed.png" alt="preview">
            </div>
            <div class="forum-header">
                <span class="forum-header-author">SomeName</span>
                <span class="forum-header-date">2023-04-28</span>
                <span class="forum-header-title">Как получить техническую сингулярность в хард скиллах? </span>
            </div>


            <div class="forum-footer">
                <div class="forum-footer-view">
                    <img class="social-icon" src="../../image/like.png" alt="social-icon">
                    <span>345</span>
                </div>
                <div class="forum-footer-like">
                    <img class="social-icon" src="../../image/eye.png" alt="social-icon">
                    <span>34</span>
                </div>
            </div>
        </div>
    </section>
</main>