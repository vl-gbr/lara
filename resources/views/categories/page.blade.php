<?php
include "../resources/views/menu.blade.php";
?>
<?php if (isset($page) && !empty($page)):?>
    <h3>Категория</h3>
    <h4><?= $page['id'] . '. ' . $page['title']?></h4>
    <a href="/news/category/<?=$page['id']?>/list"><?=$page['slug']?></a>
    <p>
        <?=$page['text']?>
    </p>
<?php endif;?>