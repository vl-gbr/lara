<?php
    include "../resources/views/admin/menu.php";
?>
<h3>Категории новостей</h3>
<?php foreach ($cats as $one): ?>
<h4>
    <a href="<?=route('admin.categories.show', ['category'=>$one['id']])?>"><?=$one['title']?></a>
</h4>
<?=$one['slug']?>
<p>
    <?=$one['text']?>
</p>
<?php endforeach;?>