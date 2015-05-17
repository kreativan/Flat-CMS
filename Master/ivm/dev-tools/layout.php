<div class="dev-tools-heading">
    <h3><i class="uk-icon-code"></i> Layouts</h3>
    <a class="ivm-dev-close"><i class="uk-icon-close"></i></a> 
</div>
<!-- This is the tabbed navigation containing the toggling elements -->
<ul class="uk-tab" data-uk-tab="{connect:'#dev-toolbar-tabs'}">
    <li><a href="">Module</a></li>
    <li><a href="">Grid</a></li>
    <li><a href="">Panel</a></li>
    <li><a href="">Classes</a></li>
</ul>

<!-- This is the container of the content items -->
<ul id="dev-toolbar-tabs" class="uk-switcher uk-margin">
    <li>
        <div class="uk-accordion" data-uk-accordion>
            <?php include("../ivm/dev-tools/layout/modules.php");?>
        </div>    
    </li>
    <li>
        <div class="uk-accordion" data-uk-accordion>
            <?php include("../ivm/dev-tools/layout/grid.php");?>
        </div>    
    </li>
    <li>
        <div class="uk-accordion" data-uk-accordion>
            <?php include("../ivm/dev-tools/layout/panels.php");?>
        </div>    
    </li>
    <li>
        <?php include("../ivm/dev-tools/layout/classes.php");?>  
    </li>
</ul>