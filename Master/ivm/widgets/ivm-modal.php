<?php

    $tag_var1 = $tag_var1 . '.txt';

    $folder = "content/blocks/@modals/$tag_var1";
    $items = glob($folder . "*.{txt}", GLOB_BRACE);

    $modal = "content/blocks/@modals/$tag_var1";

?>

<style>
.ivm-widget-modal .uk-modal-dialog {
    margin:auto;
}
</style>

<?php
    $item_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($modal));
    $id = str_replace(' ','-',$item_name);
?>

<div id="<?php echo $id;?>" class="uk-modal ivm-widget-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <?php include($modal);?>
    </div>
</div>