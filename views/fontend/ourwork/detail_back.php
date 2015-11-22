<div id="main_all">
            <div id="mainL">
            	<ul class="navL">
            		<? foreach($data as $ourwork_data){?>
                		<li><a href="<?php echo WEB_PATH;?>/ourwork/ourwork_detail/<?=$ourwork_data["ourwork_id"]?>" class="curve4 <?php if($ourwork_data["ourwork_id"]==$ourwork_id) echo "active";?>"><?php echo $ourwork_data["ourwork_name"];?> <i class="icon_bul"></i></a></li>
                    <? } ?>
                </ul>
            </div><!--End MainL-->
            <div id="mainR" class="borLf4">
            	<h2 class="topic">ผลงานที่ผ่านมา <img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>
            	<!--
            	<div class="detail_img">
                	<div class="detail_imgL"><img src="<?php echo WEB_PATH;?>/assets/images/product_pic1.jpg" /></div>
                    <div class="detail_imgR"><img src="<?php echo WEB_PATH;?>/assets/images/product_pic1.jpg" /></div>
                </div>
               -->
                <div class="detail_con">
                		<?=$ourwork_detail["ourwork_detail"]?>
                </div>
            </div><!--End MainR-->
        </div><!--End Main-->