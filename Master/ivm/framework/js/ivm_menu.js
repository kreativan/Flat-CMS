jQuery(function($) {

    // MAIN MENU ACTIVE CLASS 
    $(".uk-navbar-nav > li > a").filter(function(){
        return this.href == location.href.replace(/#.*/, "");
    }).parent().addClass("uk-active");
    
    // DROPDOWN MAIN MENU ACTIVE CLASS 
    $('.uk-dropdown a').filter(function(){
    return $(this).attr('href') == location.pathname
    }).addClass('uk-active').closest('div').parent().addClass('uk-active');
    
    // Add class to header when page heading is on the page
    $( ".ivm-page-heading" ).prev().addClass( "ivm-active-header" );
    $( ".ivm-full-screen" ).prev().addClass( "ivm-active-header" );
    
    
    // SIDEBAR MENU ACTIVE CLASSES
    
    // sidebar menu active class
    $(".uk-nav > li > a").filter(function(){
        return this.href == location.href.replace(/#.*/, "");
    }).parent().addClass("uk-active");
    
    // sidebar submenu - parent active class
    $(".uk-nav-sub > li > a").filter(function(){
     return this.href == location.href.replace(/#.*/, "");
    }).parentsUntil(".uk-nav").addClass("uk-active");
    
    // sidebar submenu - parent active class
    $(".uk-nav-sub > li > a").filter(function(){
        return this.href == location.href.replace(/#.*/, "");
    }).parent().addClass("uk-active");
    
    // sidebar parent open
    $( ".uk-parent.uk-active > div" ).css("height", "auto");

});