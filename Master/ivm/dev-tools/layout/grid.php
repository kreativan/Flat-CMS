<!-- Grid -->

<h3 class="uk-accordion-title uk-active">Container </h3>
<div class="uk-accordion-content">
                
    <div class="ivm-html-code-title">uk-container</div>
    <div id="ivm-container-code" class="ivm-html-code" onclick="selectText('ivm-container-code')">
        <?php echo htmlspecialchars('<div class="uk-container uk-container-center">'); ?>
        <br>CONTENT<br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">uk-container uk-width-medium-1-2</div>
    <div id="ivm-container-size-code" class="ivm-html-code" onclick="selectText('ivm-container-size-code')">
        <?php echo htmlspecialchars('<div class="uk-container-center uk-width-medium-1-2">CONTENT</div>'); ?>
        <br>CONTENT<br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">float left - float-right</div>
    <div id="uk-float-code" class="ivm-html-code" onclick="selectText('uk-float-code')">
        <?php echo htmlspecialchars('<div class="uk-clearfix">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-float-left">LEFT</div>'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-float-right">RIGHT</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>

</div>

<h3 class="uk-accordion-title">uk grid </h3>
<div class="uk-accordion-content">              
    
    <div class="ivm-html-code-title">uk-grid -> uk-width</div>
    <div id="uk-grid-width-code" class="ivm-html-code" onclick="selectText('uk-grid-width-code')">
        <?php echo htmlspecialchars('<div class="uk-grid" data-uk-grid-match="{target:\'.uk-panel\'}">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-width-medium-1-2">'); ?>
        <br>
        CONTENT 1
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-width-medium-1-2">'); ?>
        <br>
        CONTENT 2
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">uk-grid -> uk-width -> uk-panel</div>
    <div id="uk-grid-width-panel-code" class="ivm-html-code" onclick="selectText('uk-grid-width-panel-code')">
        <?php echo htmlspecialchars('<div class="uk-grid" data-uk-grid-match="{target:\'.uk-panel\'}">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-width-medium-1-2">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-panel">'); ?>
        <br>
        CONTENT 1
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-width-medium-1-2">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-panel">'); ?>
        <br>
        CONTENT 2
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">ul-grid even grid</div>
    <div id="uk-grid-even-code" class="ivm-html-code" onclick="selectText('uk-grid-even-code')">
        <?php echo htmlspecialchars('<ul class="uk-grid uk-grid-width-medium-1-3">'); ?>
        <br>
        <?php echo htmlspecialchars('<li><div class="uk-panel">CONTENT</div></li>'); ?>
        <br>
        <?php echo htmlspecialchars('<li><div class="uk-panel">CONTENT</div></li>'); ?>
        <br>
        <?php echo htmlspecialchars('<li><div class="uk-panel">CONTENT</div></li>'); ?>
        <br>
        <?php echo htmlspecialchars('</ul>'); ?>
    </div>

</div>

<h3 class="uk-accordion-title">Flex </h3>
<div class="uk-accordion-content">
                
    <div class="ivm-html-code-title">uk-flex -> uk-panel</div>
    <div id="uk-flex-code" class="ivm-html-code" onclick="selectText('uk-flex-code')">
        <?php echo htmlspecialchars('<div class="uk-flex uk-flex-wrap uk-flex-middle">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-panel uk-panel-box  uk-panel-box-primary uk-width-1-3">'); ?>
        <br>
        CONTENT
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">uk-flex-space-between</div>
    <div id="uk-flex-space-code" class="ivm-html-code" onclick="selectText('uk-flex-space-code')">
        <?php echo htmlspecialchars('<div class="uk-flex uk-flex-wrap uk-flex-middle uk-flex-space-between">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-panel uk-width-1-3">'); ?>
        <br>
        CONTENT
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">uk-flex-column</div>
    <div id="uk-flex-column-code" class="ivm-html-code" onclick="selectText('uk-flex-column-code')">
        <?php echo htmlspecialchars('<div class="uk-flex uk-flex-column">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-panel uk-width-1-3">'); ?>
        <br>
        CONTENT
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">uk-flex all center</div>
    <div id="uk-flex-center-code" class="ivm-html-code" onclick="selectText('uk-flex-center-code')">
        <?php echo htmlspecialchars('<div class="uk-flex uk-flex-wrap uk-flex-middle uk-flex-center">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-panel uk-width-1-3">'); ?>
        <br>
        CONTENT
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
    </div>

</div>

<h3 class="uk-accordion-title">Sidebar </h3>
<div class="uk-accordion-content">
                
    <div class="ivm-html-code-title">Sidebar Right</div>
    <div id="uk-sidebar-r-code" class="ivm-html-code" onclick="selectText('uk-sidebar-r-code')">
    <?php echo htmlspecialchars('<div class="uk-container uk-container-center">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-grid" data-uk-grid-match="{target:\'.ivm-content\'}">'); ?>
        <br>
            <?php echo htmlspecialchars('<div class="uk-width-medium-3-4">'); ?>
        <br>
                <?php echo htmlspecialchars('<div class="ivm-content">'); ?>
        <br>
                    CONTENT
        <br>
                <?php echo htmlspecialchars('</div>'); ?>
        <br>
            <?php echo htmlspecialchars('</div>'); ?>
        <br>
            <?php echo htmlspecialchars('<div class="uk-width-medium-1-4">'); ?>
        <br>
                <?php echo htmlspecialchars('<div class="ivm-sidebar ivm-content">'); ?>
        <br>
                    SIDEBAR
        <br>
                <?php echo htmlspecialchars('</div>'); ?>
        <br>
            <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
    <?php echo htmlspecialchars('</div>'); ?>
    </div>
    
    <div class="ivm-html-code-title">Sidebar left</div>
    <div id="uk-sidebar-l-code" class="ivm-html-code" onclick="selectText('uk-sidebar-l-code')">
    <?php echo htmlspecialchars('<div class="uk-container uk-container-center">'); ?>
        <br>
        <?php echo htmlspecialchars('<div class="uk-grid" data-uk-grid-match="{target:\'.ivm-content\'}">'); ?>
        <br>
            <?php echo htmlspecialchars('<div class="uk-width-medium-1-4">'); ?>
        <br>
                <?php echo htmlspecialchars('<div class="ivm-sidebar ivm-content">'); ?>
        <br>
                    SIDEBAR
        <br>
                <?php echo htmlspecialchars('</div>'); ?>
        <br>
            <?php echo htmlspecialchars('</div>'); ?>
        <br>
            <?php echo htmlspecialchars('<div class="uk-width-medium-3-4">'); ?>
        <br>
                <?php echo htmlspecialchars('<div class="ivm-content">'); ?>
        <br>
                    CONTENT
        <br>
                <?php echo htmlspecialchars('</div>'); ?>
        <br>
            <?php echo htmlspecialchars('</div>'); ?>
        <br>
        <?php echo htmlspecialchars('</div>'); ?>
        <br>
    <?php echo htmlspecialchars('</div>'); ?>
    </div>


</div>