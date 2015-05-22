<!--    Ivan Milincic, http://www.kreativan.net     -->
<nav class="uk-navbar">

    <ul class="uk-navbar-nav">
        <li><a data-uk-toggle="{target:'#ivm-dev-pages'}"><i class="uk-icon-file-text-o"></i> <?php echo $lg_admin_pages; ?></a></li>
        <li><a data-uk-toggle="{target:'#ivm-dev-layout'}"><i class="uk-icon-list-alt"></i> <?php echo $lg_admin_layout; ?></a></li>
        <li><a data-uk-toggle="{target:'#ivm-dev-web-elements'}"><i class="uk-icon-code"></i> <?php echo $lg_admin_web_elements;?></a></li>
        <li><a data-uk-toggle="{target:'#ivm-dev-extensions'}"><i class="uk-icon-puzzle-piece"></i> Extensions</a></li>
        <li><a href="index.php?f=media" target="_blank"><i class="uk-icon-external-link"></i> <?php echo $lg_admin_get_media;?></a></li>
    </ul>

    <div class="uk-navbar-flip">
        <ul class="uk-navbar-nav">
            <li class="uk-parent" data-uk-dropdown="{mode:'click'}">
                <a class="ivm-quick-menu-button" style="font-size:24px;"><i class="uk-icon-bars"></i></a>
                <?php include("../ivm/system/quick_menu.php"); ?>
            </li>
        </ul>
    </div>

</nav>