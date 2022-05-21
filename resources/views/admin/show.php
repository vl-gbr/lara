<?php
    include "../resources/views/admin/menu.php";
?>
<div>
    <h4><?=($news['id']+'1') . '. ' . $news['title']?></h4>
    <span><?=$news['slug']?></span>
    <p><?=$news['description']?></p>
</div>