<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.js"></script>  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=th"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/fancybox/jquery.fancybox.js"></script>  
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/fancybox/helpers/jquery.fancybox-buttons.js"></script> 
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script> 
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/fancybox/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.realperson.js"></script>  
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/fancybox/jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/fancybox/helpers/jquery.fancybox-buttons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/fancybox/helpers/jquery.fancybox-thumbs.css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/jquery.realperson.css" />
<style>
	.noscrollbar {
		line-height:1.35;
		overflow:hidden;
		white-space:nowrap;
		}
</style>
<div id="main_all">
        	<h2 class="topic">ติดต่อเรา <img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>
            <div class="o clear">
            
            	<div class="contact_sec1">
                	<div class="map">
                    	<img src="<?php echo WEB_PATH;?>/assets/images/map1.jpg" />
                    	<a class="fancybox bt_map" href="<?php echo WEB_PATH;?>/assets/images/map2.png" alt="Supreme Map" title="Supreme Map">Supreme Map</a>
                    </div>
                    <div class="map">
                    	<!--<iframe width="300px" scrolling="no" height="250px" frameborder="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=213437874961697190172.0004e57807846f9e21de4&amp;ie=UTF8&amp;t=m&amp;z=17&amp;output=embed" marginwidth="0" marginheight="0"></iframe>-->
                    	<div id="map_canvas" style="width:278px; height:230px; margin:0 auto; padding:10px;"></div>
                    	<a id="google" class="bt_map" href="<?php echo WEB_PATH;?>/contactus/map_large" alt="Google Map" title="Google Map">Google Map</a>
                    </div>
                </div>
                <div class="contact_sec2">
                	<div class="input_contact pad15">
                    <form name="myform" id="myform" action="<?php echo $form_action;?>" method="post">
                    	<div class="formsec">
                            ชื่อ-นามสกุล <span style="color:red;">*</span><br />
                            <input type="text" class="curve4" name="contact_name"/>
                            อีเมล <span style="color:red;">*</span><br />
                            <input type="text" class="curve4" name="contact_email"/>
                            เรื่องที่ต้องการติดต่อ <span style="color:red;">*</span><br />
                            <input type="text" class="curve4" name="message_title"/>
                            รายละเอียด <span style="color:red;">*</span><br />
                            <textarea class="curve4" name="message_detail"></textarea><?//=$capcha?><br />
                            
                            ใส่ข้อความในภาพ <br /><br /><input type="text" id="defaultReal" name="defaultReal">
                            <!--<input type="text" class="curve4" name="capcha" id="capcha"/>-->
                        </div>
                    	
                        <div class="bt_sec">
                        	<button type="submit" class="bt-submit curve4">ส่งข้อมูล<i class="icon_bul"></i></button>
                        </div>
                        
                    </form>
                    	
                    </div>
                </div>
                <div class="contact_sec2">
                    <h1>Contact Us</h1>
                    
                    <b>Supreme Products Co.,Ltd.</b><br />
                    449 & 451 Somdejphapinklao Road,<br />
                    Bangyeekhan, Bangplad, Bangkok 10700<br /><br />
                    
                    <b>Tel. :</b> 0-2434-0040, 50<br />
                    <b>Fax. :</b> 0-2433-3971<br />
                    <b>email :</b> info@supremeproducts.co.th
                </div>
            
            </div>
        </div><!--End Main-->
        
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
   content:"<div class='noscrollbar'><b>บริษัทสุพรีม ไฮทีร่า  จำกัด </b><br><hr>449 , 451 ถนนสมเด็จพระปิ่นเกล้า 2<br>แขวงบางยี่ขัน เขตบางพลัด<br>กรุงเทพมหานคร  10700</div>"
  });

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });
}

  
$(document).ready(function(){
 myMaps();
});

$(function() {
	$('#defaultReal').realperson({includeNumbers: true});
});

$('.fancybox').fancybox({'ajax':{cache	: false}});
$('#google').fancybox({'type':'iframe'});
</script>
<script> 

	$("#myform").validate({
		   		submitHandler: function(form) 
		   		{
		   			  $.ajax({
            				url: '<?php echo $form_action;?>',
            				cache: false,
            				type: 'POST',
           					data: $('#myform').serialize(),
            				dataType: "json",
            				timeout: 200,
            				success: function (data, status) 
            					{
                					alert(data.message);
                					
                					if(data.message == "ทำการเพิ่มข้อมูลเรียบร้อยแล้วค่ะ !")
                						window.location.reload();
            					}
        			});
            }
   		});
</script> 