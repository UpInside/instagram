<?php

require 'Instagram.class.php';

$InstaId = 'INSTA_ID';
$InstaToken = 'INSTA_TOKEN';
$Instagram = new Instagram($InstaId, $InstaToken);
$InstaArray = $Instagram->getRecent();
if (!empty($InstaArray->meta->code) && $InstaArray->meta->code == 200):
    foreach ($InstaArray->data as $InstaPost):
        $InstaText = (!empty($InstaPost->caption->text) ? $InstaPost->caption->text : 'Imagem no Instagram!');
        echo "<img alt='{$InstaText}' title='{$InstaText}' width='100%' src='{$InstaPost->images->thumbnail->url}'/>";
    endforeach;
else:
   echo "OPPPSSS, erro no Instagram!";
endif;
