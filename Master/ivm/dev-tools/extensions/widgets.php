
<!-- ACC START -->
<div class="uk-accordion uk-margin-top" data-uk-accordion>
    
    <!-- custom widgets -->
    <?php include("../template/admin/widgets.php");?> 
    
</div><!-- ACC END -->

<?php $folders = glob("../content/blocks/@widgets" . '/*' , GLOB_ONLYDIR); ?>
<?php foreach($folders as $folder) : ?>
    <?php 
        $folder = basename($folder);
        $folder_name = str_replace('@', '', $folder);
    ?>

        <div class="ivm-html-code-title"><?php echo $folder_name;?></div>
        <div id="ivm-<?php echo $folder_name;?>-code" class="ivm-html-code" onclick="selectText('ivm-<?php echo $folder_name;?>-code')">
            <?php echo '{{'.$folder_name.'}}'; ?>
        </div>

<?php endforeach;?>