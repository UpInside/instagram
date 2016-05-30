<?php

require 'Instagram.class.php';

$InstaId = 'INSTA_ID';
$InstaToken = 'INSTA_TOKEN';
$Instagram = new Instagram($InstaId, $InstaToken);
$InstaArray = $Instagram->getRecent();
if (!empty($InstaArray->meta->code) && $InstaArray->meta->code == 200):
    echo "<section class='wc_conversion_insta'>";
    echo "<h1 class='wc_conversion_insta_title'><a target='_blank' href='https://www.instagram.com/" . SITE_SOCIAL_INSTAGRAM . "' title='" . SITE_SOCIAL_NAME . " no Instagram!'><b>" . SITE_SOCIAL_NAME . "</b> no Instagram!</a></h1>";
    echo "<div class='wc_conversion_insta_blur'></div>";
    foreach ($InstaArray->data as $InstaPost):
        $InstaText = (!empty($InstaPost->caption->text) ? $InstaPost->caption->text : 'Imagem de ' . SITE_NAME . ' no Instagram!');
        echo "<article><h1 class='site_title'>{$InstaText}</h1><img alt='{$InstaText}' title='{$InstaText}' width='100%' src='{$InstaPost->images->thumbnail->url}'/></article>";
    endforeach;
    echo "</section>";
else:
    Erro('<div class="content" style="text-align:center"><b>INDEX.php//138</b> Configure o Instagram Aqui!</div>');
endif;
