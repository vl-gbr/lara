<?php
include "../resources/views/menu.php";
?>
<?php // if (isset($page) && !empty($page)):?>
<?php  //if (!empty($page)) :?>
    <h3>News page</h3>
    <h4><?= ($page ? $page['id'] . '. ' : "") . ($page['title'] ?? "") ?></h4>
    <p>
        <?=$page['text'] ?? "404 -- Page not found.."?>
    </p>
<?php //endif;?>