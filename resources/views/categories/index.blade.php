<?php
    include "../resources/views/menu.blade.php";
?>
<h3>Категории новостей</h3><br>
<?php foreach ($categories as $one): ?>
    <h4>
        <a href="/news/category/<?=$one['id']?>"><?=$one['title']?></a>
    </h4>
    <p>
        <?=$one['text']?>
    </p>
<?php endforeach;?>