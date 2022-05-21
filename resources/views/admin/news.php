<?php
    include "../resources/views/admin/menu.php";
?>
<?php foreach ($lastNews as $news): ?>
    <?php $idx = $news['id']+1; ?>
    <div>
        <h4><?=$idx . '. '?><a href="<?=route('admin.news.show', ['news'=>$idx])?>"><?=$news['title']?></a></h4>
        <span><?=$news['slug']?></span>
        <p><?=$news['description']?></p>
    </div>
    <br>
<?php endforeach; ?>