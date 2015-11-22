<div id="main_all">
        	<h2 class="topic">สินค้าและบริการ <img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>
            <div class="o clear padTB15">
            	<? foreach($product_data as $products){?>
            	<div class="product_home">
                	<h3><a href="<?php echo WEB_PATH;?>/product/product_detail/<?php echo $products["product_id"]?>"><?php echo $products["product_name"]?></a>  <img src="<?php echo WEB_PATH;?>/assets/images/plus.png" /></h3>
                    <div class="product_pic clear">
                        <a href="<?php echo WEB_PATH;?>/product/product_detail/<?php echo $products["product_id"]?>"><img src="<?php echo WEB_PATH;?>/upload/product/<?php echo $products["product_id"];?>.<?php echo $products["file_type"];?>" /></a>
                    </div>
                    <p><?php echo $products["product_intro"]?></p>
                    <a href="<?php echo WEB_PATH;?>/product/product_detail/<?php echo $products["product_id"]?>" class="more"></a>
                </div>
                <? } ?>
            </div>
        </div><!--End Main-->