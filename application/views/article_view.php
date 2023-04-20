<?php
require_once './application/views/header.php';
?>
<main class="forum-root">
    <section class="content-container">
        <?php

        echo $data;
        ?>
    </section>
</main>
<script src="https://cdn.tiny.cloud/1/9lkwjfbhkndnj72wuriizlejd0lw5mvvsflvkk931582hei1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        width: 100 + "%",
        height: 65 + "vh",
        plugins: 'autolink lists link image preview',
        toolbar: 'undo redo | image | blocks | ' +
            'bold   italic | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat',
    });
</script>
<style>
    .tox .tox-toolbar-overlord {
        background-color: #333;
    }

    /* Изменить цвет текста на кнопках панели инструментов */
    .tox .tox-statusbar {
        display: none;
    }
    .tox .tox-menu.tox-collection.tox-collection--list{
        min-width: 215px;
    }
    .tox-tiered-menu{
        min-width: 215px;
    }
    .mce-container-body.mce-abs-layout-item.mce-last > div > div > div > div:first-child {
     display: none;
    }
</style>