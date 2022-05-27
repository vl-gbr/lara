<?php
    include "../resources/views/menu.blade.php";
?>
<h3>Категории новостей</h3><br>
<?php foreach ($categories as $one): ?>
    <h4>
        <a href="/news/<?=$one['slug']?>"><?=$one['title']?></a><br>
        <a href="<?= route('news.newsbyslug', $one['slug'])?>"><?=$one['title']?></a>
    </h4>
    <p>
        <?=$one['text']?>
    </p>
<?php endforeach;?>