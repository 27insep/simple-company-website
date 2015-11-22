<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-Frame-Options" content="allow">
<title></title>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=th"></script>
<style>
	.noscrollbar {
		line-height:1.35;
		overflow:hidden;
		white-space:nowrap;
		}
</style>
</head>
<body>

<div id="map_canvas" style="width:830px; height:540px; margin:0 auto; padding:10px;"></div>
        
<script type="text/javascript">
var name='supreme';
var lat='13.7650975';
var lng='100.4891760';
var zoom='15';

function myMaps(){
var mapsGoo=google.maps;
var Position=new mapsGoo.LatLng(lat,lng);
var myOptions = {
    center:Position,
    zoom:parseInt(zoom),
    mapTypeId: mapsGoo.MapTypeId.ROADMAP //ชนิดของแผนที่
    };
var map = new mapsGoo.Map(document.getElementById("map_canvas"),myOptions);
var infowindow = new mapsGoo.InfoWindow();
var marker = new mapsGoo.Marker({//เรียกเมธอดMarker(หมุด)
    position: Position,
});
marker.setMap(map);
//infowindow.setContent(name);
infowindow.open(map, marker);

var infowindow = new google.maps.InfoWindow({
  content:"<div class='noscrollbar'><b>บริษัทสุพรีม ไฮทีร่า  จำกัด </b><br><hr>449 , 451  ถนนสมเด็จพระปิ่นเกล้า 2<br>แขวงบางยี่ขัน เขตบางพลัด<br>กรุงเทพมหานคร  10700</div>"
  });

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });

}

$(document).ready(function(){
 myMaps();
});
</script>
<!--
<iframe width="800" scrolling="no" height="600" frameborder="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=213437874961697190172.0004e57807846f9e21de4&amp;ie=UTF8&amp;t=m&amp;z=17&amp;output=embed" marginwidth="0" marginheight="0"></iframe>-->
</body>
</html>