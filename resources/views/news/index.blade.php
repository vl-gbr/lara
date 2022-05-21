<?php
    include "../resources/views/menu.php";
?>
<h3>Last news</h3><br>
<?php foreach ($news as $page): ?>
    <h4>
        <a href="/news/<?=$page['id']?>"><?=$page['title']?></a>
    </h4>
<span>Категория  <?=$page['category']?></span>
    <p>
        <?=$page['text']?>
    </p>
<?php endforeach;?>