<li><a href="index.php?p=home&f=blocks/@grid">Custom Widget</a></li>


<!-- Protect files and folders -->
<script>
jQuery(function($) {
    
    // @kreativan-tabs
    $('a[href="index.php?p=home&f=blocks/@kreativan-tabs"]').addClass('ivm-protect');
    $('#ivm-admin-main .ivm-protect').parent().addClass('uk-hidden');
    $('#ivm-admin-main .folder-row.uk-hidden').parent().addClass('uk-hidden');
    $('a[href="index.php?p=rename&d=blocks/@kreativan-tabs"]').addClass('uk-hidden');
    
    // @kreativan-portfolio
    $('a[href="index.php?p=home&f=media/@kreativan-portfolio"]').addClass('ivm-protect');
    $('#ivm-admin-main .ivm-protect').parent().addClass('uk-hidden');
    $('#ivm-admin-main .folder-row.uk-hidden').parent().addClass('uk-hidden');
    $('a[href="index.php?p=rename&d=media/@kreativan-portfolio"]').addClass('uk-hidden');
    $('a[href="index.php?p=upload&gallery=media/@kreativan-portfolio"] + .tagdiv input').val("{{kreativan-portfolio}}");
    $('a[href="index.php?p=upload&gallery=media/@kreativan-portfolio"] + .tagdiv input+input').addClass("uk-hidden");

 }); 
</script>