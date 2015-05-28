jQuery(function($) {
  
    // PROTECT SPECIFIC FOLDERS
    
    $('#ivm-admin-main .ivm-protect').parent().addClass('uk-hidden');
    $('#ivm-admin-main .folder-row.uk-hidden').parent().addClass('uk-hidden');
    
    // @menus
    $('a[href="index.php?p=home&f=blocks/@menus"]').addClass('ivm-protect');
    $('a[href="index.php?p=rename&d=blocks/@menus"]').addClass('uk-hidden');
    
    // @system
    $('a[href="index.php?p=home&f=blocks/@system"]').addClass('ivm-protect');
    $('a[href="index.php?p=rename&d=blocks/@system"]').addClass('uk-hidden');
    
    // @sidebar
    $('a[href="index.php?p=home&f=blocks/@sidebar"]').addClass('ivm-protect');
    $('a[href="index.php?p=rename&d=blocks/@sidebar"]').addClass('uk-hidden');
    
    // @widgets
    $('a[href="index.php?p=home&f=blocks/@widgets"]').addClass('ivm-protect');
    $('a[href="index.php?p=rename&d=blocks/@widgets"]').addClass('uk-hidden');
    $('a[href="index.php?p=delete&d=blocks/@widgets"]').addClass('uk-hidden');
    
    
    $('.uk-dropdown .uk-panel > li').removeClass('uk-hidden');
    
    
    // SYS FILES PROTECT
    
    // sb_main_menu
    $('a[href="index.php?p=open&f=blocks/@menus/sb_main_menu&e=txt"] + .delete').addClass('uk-hidden');
    $('a[href="index.php?p=rename&d=blocks/@menus/sb_main_menu&e=.txt"]').addClass('uk-hidden');
    
    // sb_mobile_menu
    $('a[href="index.php?p=open&f=blocks/@menus/sb_mobile_menu&e=txt"] + .delete').addClass('uk-hidden');
    $('a[href="index.php?p=rename&d=blocks/@menus/sb_mobile_menu&e=.txt"]').addClass('uk-hidden');
    
    // sb_meta
    $('a[href="index.php?p=open&f=blocks/@system/sb_meta&e=txt"] + .delete').addClass('uk-hidden');
    $('a[href="index.php?p=rename&d=blocks/@system/sb_meta&e=.txt"]').addClass('uk-hidden');
    
    // sb_google_analytics
    $('a[href="index.php?p=open&f=blocks/@system/sb_google_analytics&e=txt"] + .delete').addClass('uk-hidden');
    $('a[href="index.php?p=rename&d=blocks/@system/sb_google_analytics&e=.txt"]').addClass('uk-hidden');
    
    // sb_less & sb_less_OFF
    $('a[href^="index.php?p=open&f=blocks/@system/sb_less"] + .delete').addClass('uk-hidden');
    
    // sb_custom_css
    $('a[href^="index.php?p=open&f=blocks/@system/sb_custom_css"] + .delete').addClass('uk-hidden');
    
    // sb_custom_js
    $('a[href^="index.php?p=open&f=blocks/@system/sb_custom_js"] + .delete').addClass('uk-hidden');
    
    
    // prevent rename on all images
    $('a.rename[href$="&e=.jpg"]').addClass('uk-hidden');
    $('a.rename[href$="&e=.png"]').addClass('uk-hidden');
    $('a.rename[href$="&e=.gif"]').addClass('uk-hidden');
    $('a.rename[href$="&e=.svg"]').addClass('uk-hidden');
    
    
});