<!-- HEADING -->
<div class="dev-tools-heading">
    <h3><i class="uk-icon-rocket"></i> Widgets</h3>
    <a class="ivm-dev-close"><i class="uk-icon-close"></i></a> 
</div>

<!-- ACC START -->
<div class="uk-accordion uk-margin-large-top" data-uk-accordion>
    
    <h3 class="uk-accordion-title uk-active">@Basic Components</h3>
    <div class="uk-accordion-content">
        <p class="uk-text-small">You can display widget inside IVM Block</p>
        <div class="ivm-html-code-title">IVM Block</div>
        <div id="ivm-block-widget-code" class="ivm-html-code" onclick="selectText('ivm-block-widget-code')">
            <?php echo '{{ivm-block:/folder}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Blog</div>
        <div id="ivm-blog-widget-code" class="ivm-html-code" onclick="selectText('ivm-blog-widget-code')">
            <?php echo '{{ivm-blog}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Contact Form</div>
        <div id="ivm-form-widget-code" class="ivm-html-code" onclick="selectText('ivm-form-widget-code')">
            <?php echo '{{ivm-form}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Google Map</div>
        <div id="ivm-map-widget-code" class="ivm-html-code" onclick="selectText('ivm-map-widget-code')">
            <?php echo '{{ivm-map}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Gallery</div>
        <div id="ivm-gallery-widget-code" class="ivm-html-code" onclick="selectText('ivm-gallery-widget-code')">
            <?php echo '{{ivm-gallery:folder_name}}'; ?>
        </div>
        
    </div>
    
    <!-- custom widgets -->
    <?php include("../template/admin/widgets.php");?>
    
</div><!-- ACC END -->