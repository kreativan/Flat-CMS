<?php
    // Settings
/*
    $map_height = '400px';
    $map_lat = 44.783332;
    $map_lng = 20.436115;
    $map_zoom = '13';
    $map_title = '';
    $map_text = '';
*/
?>

<div id="ivm-map" style="height:<?php echo $map_height;?>;width:100%;"></div>

<style>   
#ivm-map img {
    max-width: none;
}
</style>

<script src="<?php echo $path; ?>/ivm/widgets/js/gmaps.js"></script>
<p style="margin:0px;">
<script type="text/javascript">
jQuery(function($) {   
    var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#ivm-map',
        //lat:'<?php echo $map_lat;?>',
        //lng:'<?php echo $map_lng;?>',
        center: new google.maps.LatLng(<?php echo $map_lat;?>, <?php echo $map_lng;?>),
        backgroundColor:'',
        draggable:true,
        scrollwheel:false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        disableDefaultUI: false,
        zoomControl:'true',
            zoomControlOptions: {
            style:google.maps.ZoomControlStyle.SMALL // DEFAULT , SMALL , LARGE
          },
        mapTypeControl:true,
            mapTypeControlOptions: {
            style:google.maps.MapTypeControlStyle.DROPDOWN_MENU // DEFAULT , DROPDOWN_MENU, HORIZONTAL_BAR , 
          },
        zoom:<?php echo $map_zoom;?>
      });
        
      map.addMarker({
        lat:<?php echo $map_lat;?>,
        lng:<?php echo $map_lng;?>,
        title: 'Marker with InfoWindow',
        infoWindow: {
            content: '<h3><?php echo $map_title;?></h3><p><?php echo $map_text;?>.</p>'
        }
      });
    }); 
});    
</script>
</p>