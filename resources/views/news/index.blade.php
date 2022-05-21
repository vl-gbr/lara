<?php
    include "../resources/views/menu.php";
?>
<h3>Last news</h3>
<?php foreach ($news as $page): ?>
<h4>
    <a href="/news/<?=$page['id']?>"><?=$page['title']?></a>
</h4>
<p>
    <?=$page['text']?>
</p>
<?php endforeach;?>