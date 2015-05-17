<!-- HEADING -->
<div class="dev-tools-heading">
    <h3><i class="uk-icon-code"></i> Web Elements</h3>
    <a class="ivm-dev-close"><i class="uk-icon-close"></i></a> 
</div>

<!-- ACC -->
<div class="uk-accordion uk-margin-large-top" data-uk-accordion>

    <h3 class="uk-accordion-title uk-active">Buttons</h3>
    <div class="uk-accordion-content">
        
        <div class="ivm-html-code-title">Button</div>
        <div id="ivm-button-code" class="ivm-html-code" onclick="selectText('ivm-button-code')">
        <?php echo htmlspecialchars('<a href="#" class="uk-button">Button</a>'); ?>
        </div>
        
        <div class="ivm-html-code-title">Button Large</div>
        <div id="ivm-button-large-code" class="ivm-html-code" onclick="selectText('ivm-button-large-code')">
        <?php echo htmlspecialchars('<a href="#" class="uk-button uk-button-large">Button</a>'); ?>
        </div>
        
        <div class="ivm-html-code-title">Button Primary</div>
        <div id="ivm-button-primary-code" class="ivm-html-code" onclick="selectText('ivm-button-primary-code')">
        <?php echo htmlspecialchars('<a href="#" class="uk-button uk-button-primary">Button</a>'); ?>
        </div>
        
        <div class="ivm-html-code-title">Button Success</div>
        <div id="ivm-button-success-code" class="ivm-html-code" onclick="selectText('ivm-button-success-code')">
        <?php echo htmlspecialchars('<a href="#" class="uk-button uk-button-success">Button</a>'); ?>
        </div>
        
        <div class="ivm-html-code-title">Button Danger</div>
        <div id="ivm-button-danger-code" class="ivm-html-code" onclick="selectText('ivm-button-danger-code')">
        <?php echo htmlspecialchars('<a href="#" class="uk-button uk-button-danger">Button</a>'); ?>
        </div>
    
    </div>
    
    <!-- custom web elements -->
    <?php include("../template/admin/web-elements.php");?> 
    
</div><!-- ACC END -->