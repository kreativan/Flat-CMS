jQuery(function($) {

    // MAIN MENU ACTIVE CLASS 
    $("#ivm-admin-nav > ul > li > a").filter(function(){
        return this.href == location.href.replace(/#.*/, "");
    }).parent().addClass("uk-active");
    
    // PARENT OPEN ACTIVE CLASS 
    $(".uk-nav-sub > li > a").filter(function(){
     return this.href == location.href.replace(/#.*/, "");
   }).parentsUntil(".uk-nav-side").addClass("uk-active");
    
    // PARENT OPEN ACTIVE CLASS 
    $(".uk-nav-sub > li > a").filter(function(){
        return this.href == location.href.replace(/#.*/, "");
    }).parent().addClass("uk-active");
    
    
    // DROPDOWN MAIN MENU ACTIVE CLASS 
    $('.uk-dropdown a').filter(function(){
    return $(this).attr('href') == location.pathname
    }).addClass('uk-active').closest('div').parent().addClass('uk-active');
    
    // add html editor to textarea
    $("#caption_form > textarea").attr("data-uk-htmleditor","{mode:'split'}");
    //$("#textblock").attr("data-uk-htmleditor","{mode:'tab', markdown:true}");
    //$("#wysiwyg").attr("data-uk-htmleditor","{mode:'tab', markdown:true}");
    
});