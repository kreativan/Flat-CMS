<!-- HEADING -->
<div class="dev-tools-heading">
    <h3><i class="uk-icon-file-text-o"></i> Page Templates</h3>
    <a class="ivm-dev-close"><i class="uk-icon-close"></i></a> 
</div>

<div class="uk-accordion uk-margin-large-top" data-uk-accordion><!-- ACC START -->
    
    <h3 class="uk-accordion-title uk-active">@Custom</h3>
    <div class="uk-accordion-content">     
        
        <?php include("../template/admin/pages.php");?>
        
    </div>
           
    <h3 class="uk-accordion-title">Page (content page)</h3>
    <div class="uk-accordion-content">     
        
        <div class="ivm-html-code-title">Page</div>
        <div id="ivm-temp-page" class="ivm-html-code" onclick="selectText('ivm-temp-page')">
            <?php echo '{{template:page}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Page With Heading</div>
        <div id="ivm-temp-page-heading" class="ivm-html-code" onclick="selectText('ivm-temp-page-heading')">
            <?php echo '{{template:page-heading}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Page With Heading + Subheading</div>
        <div id="ivm-temp-page-subheading" class="ivm-html-code" onclick="selectText('ivm-temp-page-subheading')">
            <?php echo '{{template:page-subheading}}'; ?>
        </div> 
        
    </div>
    
    <h3 class="uk-accordion-title">Article (single articles)</h3>
    <div class="uk-accordion-content">  
        
        <div class="ivm-html-code-title">Article</div>
        <div id="ivm-temp-article" class="ivm-html-code" onclick="selectText('ivm-temp-article')">
            <?php echo '{{template:article}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Article With Heading</div>
        <div id="ivm-temp-article-heading" class="ivm-html-code" onclick="selectText('ivm-temp-article-heading')">
            <?php echo '{{template:article-heading}}'; ?>
        </div> 
        
    </div>
    
    <h3 class="uk-accordion-title">Sidebar Right</h3>
    <div class="uk-accordion-content"> 
        
        <div class="ivm-html-code-title">Sidebar R</div>
        <div id="ivm-temp-sidebar-r" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-r')">
            <?php echo '{{template:sidebar-right}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar R Heading</div>
        <div id="ivm-temp-sidebar-r-heading" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-r-heading')">
            <?php echo '{{template:sidebar-right-heading}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar R Subfolder</div>
        <div id="ivm-temp-sidebar-r-sub" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-r-sub')">
            <?php echo '{{template:sidebar-right:subfolder}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar R SubF + Heading</div>
        <div id="ivm-temp-sidebar-r-heading-sub" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-r-heading-sub')">
            <?php echo '{{template:sidebar-right-heading:subfolder}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar R Subheading</div>
        <div id="ivm-temp-sidebar-r-subheading" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-r-subheading')">
            <?php echo '{{template:sidebar-right-subheading}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar R SubF + Subheading</div>
        <div id="ivm-temp-sidebar-r-sub-heading-sub" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-r-sub-heading-sub')">
            <?php echo '{{template:sidebar-right-subheading:subfolder}}'; ?>
        </div> 
        
    </div>
    
    <h3 class="uk-accordion-title">Sidebar Left</h3>
    <div class="uk-accordion-content"> 
        
        <div class="ivm-html-code-title">Sidebar L</div>
        <div id="ivm-temp-sidebar-l" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-l')">
            <?php echo '{{template:sidebar-left}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar L Heading</div>
        <div id="ivm-temp-sidebar-l-heading" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-l-heading')">
            <?php echo '{{template:sidebar-left-heading}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar L Subfolder</div>
        <div id="ivm-temp-sidebar-l-sub" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-l-sub')">
            <?php echo '{{template:sidebar-left:subfolder}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar L SubF + Heading</div>
        <div id="ivm-temp-sidebar-l-heading-sub" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-l-heading-sub')">
            <?php echo '{{template:sidebar-left-heading:subfolder}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar L Subheading</div>
        <div id="ivm-temp-sidebar-l-subheading" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-l-subheading')">
            <?php echo '{{template:sidebar-left-subheading}}'; ?>
        </div>
        
        <div class="ivm-html-code-title">Sidebar L SubF + Subheading</div>
        <div id="ivm-temp-sidebar-l-subheading-sub" class="ivm-html-code" onclick="selectText('ivm-temp-sidebar-l-subheading-sub')">
            <?php echo '{{template:sidebar-left-subheading:subfolder}}'; ?>
        </div>
        
    </div>
    
</div><!-- ACC END -->