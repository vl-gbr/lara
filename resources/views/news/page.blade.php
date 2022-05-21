<?php
include "../resources/views/menu.php";
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>
<?php if (isset($page) && !empty($page)):?>
    <h3>News page</h3>
    <h4><?= $page['id'] . '. ' . $page['title']?></h4>
    <p>
        <?=$page['text']?>
    </p>
<?php endif;?>