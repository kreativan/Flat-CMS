<li><a href="index.php?p=home&f=blocks/@tabs">Custom Widget</a></li>


<!-- Protect files and folders -->
<script>
jQuery(function($) {
    
    // system - obavezno za svaki protect falj
    $('#ivm-admin-main .ivm-protect').parent().addClass('uk-hidden');
    $('#ivm-admin-main .folder-row.uk-hidden').parent().addClass('uk-hidden');
    
    // @content block example
    $('a[href="index.php?p=home&f=blocks/@tabs"]').addClass('ivm-protect');
    $('a[href="index.php?p=rename&d=blocks/@tabs"]').addClass('uk-hidden');
    
    // @content media example
    $('a[href="index.php?p=home&f=media/@portfolio"]').addClass('ivm-protect');
    $('a[href="index.php?p=rename&d=media/@portfolio"]').addClass('uk-hidden');
    $('a[href="index.php?p=upload&gallery=media/@portfolio"] + .tagdiv input').val("{{portfolio}}");
    $('a[href="index.php?p=upload&gallery=media/@portfolio"] + .tagdiv input+input').addClass("uk-hidden");

 }); 
</script>