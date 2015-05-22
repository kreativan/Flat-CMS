<!--    Ivan Milincic, http://www.kreativan.net     -->

<div class="uk-dropdown uk-dropdown-width-2 uk-text-center">
    <h4 class="ivm-settings-heading"><i class="uk-icon-gears"></i> Settings & Tools</h4>
    <div class="uk-grid uk-dropdown-grid uk-clearfix">
        
        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="#ivm-general-settings" data-uk-modal>
                        <div><img src="../ivm/system/assets/img/icons/general.png" />
                        </div>
                        <span><?php echo $lg_admin_general; ?></span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="#ivm-dev-settings" data-uk-modal>
                        <div><img src="../ivm/system/assets/img/icons/code.png" />
                        </div>
                        <span><?php echo $lg_admin_dev; ?></span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="#ivm-email-settings" data-uk-modal>
                        <div><img src="../ivm/system/assets/img/icons/email.png" />
                        </div>
                        <span><?php echo $lg_admin_email; ?></span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="#ivm-map-settings" data-uk-modal>
                        <div><img src="../ivm/system/assets/img/icons/map.png" />
                        </div>
                        <span>Map</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="#ivm-twitter-settings" data-uk-modal>
                        <div><img src="../ivm/system/assets/img/icons/twitter.png" />
                        </div>
                        <span>Twitter</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="#ivm-gallery-settings" data-uk-modal>
                        <div><img src="../ivm/system/assets/img/icons/gallery.png" />
                        </div>
                        <span>Gallery</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="index.php?p=home&f=blocks/@system">
                        <div><img src="../ivm/system/assets/img/icons/system.png" />
                        </div>
                        <span><?php echo $lg_admin_system; ?></span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="uk-width-1-3" style="width:33%;float:left;">
            <ul style="margin:0px;">
                <li>
                    <a href="index.php?f=stats">
                        <div><img src="../ivm/system/assets/img/icons/stats.png" />
                        </div>
                        <span><?php echo $lg_admin_stats; ?></span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    
    
    <div class="ivm-quick-menu-footer uk-clearfix">
        <a class="ivm-all-settings uk-float-left" href="http://docs.kreativan.net" target="_blank">
            <i class="uk-icon-book"></i> <?php echo $lg_admin_docs; ?>
        </a>
        <a class="ivm-reload-settings uk-float-right" href="">
            <i class="uk-icon-refresh"></i> <?php echo $lg_admin_reload; ?>
        </a>
    </div>
</div>