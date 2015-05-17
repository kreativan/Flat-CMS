jQuery(function($) {
    
    $( ".folder-row" ).wrap( "<div class='ivm-folder'></div>" );
    $( ".ivm-folder" ).wrapAll( "<div class='ivm-folders' />");
    $( ".file-row" ).wrapAll( "<div class='ivm-files' />");
    $( ".folder-row > a" ).wrapInner( "<span></span>");
    
    $( ".create-form" ).before( '<h1><em>"Create"</em></h1><p><em>if you create file <b>(.txt)</b> extensions is required.</em></p>' );
    $( ".rename-form" ).before( '<h1><em>"Rename"</em></h1>' );
    $( ".upload-form" ).before( '<h1><em>"Media Upload"</em></h1>' );
    
    $( ".embed_toggle" ).click(function() {
        $( '.embed_toggle' ).toggleClass( "ivm-active" );
    });
    
    $( ".ivm-show-toolbar" ).click(function() {
        $( '#ivm-admin-toolbar' ).toggleClass( "ivm-toolbar-hide" );
    });
    
    // ivm-gallery   
    $('a[href^="index.php?p=upload&gallery=media"] + .tagdiv input').val("{{ivm-gallery:folder_name}}");
    
});