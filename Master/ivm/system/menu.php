<!--    Ivan Milincic, http://www.kreativan.net     -->

<ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav="{multiple:true}">
    
    <li class="ivm-home"><a href="./"><i class="uk-icon-home"></i> <?php echo $lg_admin_home; ?></a></li>    
    <li><a href="index.php?p=home&f=blocks/@menus"><i class="uk-icon-bars"></i> <?php echo $lg_admin_menu; ?></a></li>
    <li><a href="index.php?f=pages"><i class="uk-icon-file-text-o"></i> <?php echo $lg_admin_pages; ?></a></li>
    <li><a href="index.php?f=blocks"><i class="uk-icon-th-large"></i> <?php echo $lg_admin_blocks; ?></a></li>
    <li><a href="index.php?f=blocks/@sidebar"><i class="uk-icon-columns"></i> <?php echo $lg_admin_sidebar; ?></a></li>
    <li><a href="index.php?f=blog"><i class="uk-icon-pencil"></i> <?php echo $lg_admin_blog; ?></a></li>
    
    <?php if (file_exists("../template/admin/menu-widgets.php")) : ?>
    <li class="uk-parent"><a href="#"><i class="uk-icon-rocket"></i> <?php echo $lg_admin_widgets; ?></a>
        <ul class="uk-nav-sub">
             <?php include("../template/admin/menu-widgets.php");?>
            
            <?php $folders = glob("../content/blocks/@widgets" . '/*' , GLOB_ONLYDIR); ?>
            <?php foreach($folders as $folder) : ?>
                <?php 
                        $folder = basename($folder);
                        $folder_name = str_replace('@', '', $folder);
                ?>
                <li><a href="index.php?f=blocks/@widgets/<?php echo $folder;?>"><?php echo $folder_name;?></a></li>
            <script>
                jQuery(function($) { 
                    $('a[href="index.php?p=rename&d=blocks/@widgets/<?php echo $folder;?>"]').addClass('uk-hidden');
                    $('a[href="index.php?p=delete&d=blocks/@widgets/<?php echo $folder;?>"]').addClass('uk-hidden');
                    $('a[href^="index.php?p=rename&d=blocks/@widgets/<?php echo $folder;?>/sb_settings"]').addClass('uk-hidden');
                    $('a[href^="index.php?p=delete&d=blocks/@widgets/<?php echo $folder;?>/sb_settings"]').addClass('uk-hidden');
                });    
            </script>
            <?php endforeach;?>
            
        </ul>
    </li>
    <?php endif;?>
    
    <li><a href="index.php?f=media"><i class="uk-icon-photo"></i> <?php echo $lg_admin_media; ?></a></li>
    
    <?php if (file_exists("../template/admin/menu-multi-lang.php")) : ?>
    <li class="uk-parent"><a href="#"><i class="uk-icon-language"></i> <?php echo $lg_admin_multillang; ?></a>
        <ul class="uk-nav-sub">
             <?php include("../template/admin/menu-multi-lang.php");?>
        </ul>
    </li>
    <?php endif;?>
    
</ul>