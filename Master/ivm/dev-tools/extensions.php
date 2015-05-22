<!-- HEADING -->
<div class="dev-tools-heading">
    <h3><i class="uk-icon-puzzle-piece"></i> Extensions</h3>
    <a class="ivm-dev-close"><i class="uk-icon-close"></i></a> 
</div>

<!-- This is the tabbed navigation containing the toggling elements -->
<ul class="uk-tab" data-uk-tab="{connect:'#dev-extensions-tabs'}">
    <li><a href="">Plugins</a></li>
    <li><a href="">Widgets</a></li>
</ul>

<!-- This is the container of the content items -->
<ul id="dev-extensions-tabs" class="uk-switcher">
    <li>
            <?php include("../ivm/dev-tools/extensions/plugins.php");?>
    </li>
    <li>
            <?php include("../ivm/dev-tools/extensions/widgets.php");?> 
    </li>
</ul>
