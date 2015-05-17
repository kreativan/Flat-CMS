<?php
    // Settings
    $panorama_height = '400px';
    $panorama_lat = 44.789106;
    $panorama_lng = 20.446568;
?>

<div id="ivm-panorama" style="height:<?php echo $panorama_height;?>;width:100%;"></div>

<style>
#ivm-panorama img {
    max-width: none;
}
</style>

<p style="margin:0px;">
<script src="<?php echo $path; ?>/ivm/widgets/js/gmaps.js"></script>
<script type="text/javascript">
    var panorama;
    $(document).ready(function(){
      panorama = GMaps.createPanorama({
        el: '#ivm-panorama',
        lat : <?php echo $panorama_lat;?>,
        lng : <?php echo $panorama_lng;?>,
        scrollwheel:false
      });
    });
</script>
</p>