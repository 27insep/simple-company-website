<div id="main_all">
            <div id="mainL">
            	<ul class="navL">
            		<? foreach($data as $products_data){?>
                		<li><a href="<?php echo WEB_PATH;?>/product/product_detail/<?=$products_data["product_id"]?>" class="curve4 <?php if($products_data["product_id"]==$product_detail["product_id"]) echo "active";?>"><?=$products_data["product_name"]?> <i class="icon_bul"></i></a></li>
                    <? } ?>
                </ul>
            </div><!--End MainL-->
            <div id="mainR" class="borLf4">
            	<h2 class="topic">สินค้าและบริการ <img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>
            	<!--
            	<div class="detail_img">
                	<div class="detail_imgL"><img src="<?php echo WEB_PATH;?>/assets/images/product_pic1.jpg" /></div>
                    <div class="detail_imgR"><img src="<?php echo WEB_PATH;?>/assets/images/product_pic1.jpg" /></div>
                </div>
               -->
                <div class="detail_con">
                		<?=$product_detail["product_detail"]?>
                </div>
            </div><!--End MainR-->
        </div><!--End Main-->