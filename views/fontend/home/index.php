<style>
/* DIRECTION CONTROLS (NEXT / PREV) */
.bx-wrapper .bx-controls-direction a {
	position: absolute;
	top: 50%;
	margin-top: -16px;
	outline: 0;
	width: 32px;
	height: 32px;
	text-indent: -9999px;
	z-index: 9999;
}
.bx-wrapper .bx-prev {
	left: 10px;
}

.bx-wrapper .bx-next {
	right: 10px;
}
</style>
<div class="slide_main">
	<ul class="bxslider">
    	<?php foreach($slide_data as $slide){?>
        	<li><img src="<?php echo WEB_PATH;?>/upload/slide/<?php echo $slide["image_name"];?>" title="<?php echo $slide["image_detail"];?>" width="600px" height="300px" /></li>
      	<?php }?>
	</ul>
</div>
            <div class="com_profile">
            	<h2>Company Profile</h2>
                <div class="profile_pic">
                	<img src="<?php echo WEB_PATH;?>/assets/images/comprofile_pic.jpg" />
                </div>
                <h3>Supreme-HITERA CO.,LTD.</h3>
                <p>จากประสบการณ์การดำเนินงานทางด้านการแพทย์เป็นเวลา<br />
กว่า 30 ปี เราได้เล็งเห็นว่า IT เป็นส่วนที่เพิ่มศักยภาพการให้<br />
บริการด้านการแพทย์ จึงทำให้ได้จัดตั้งบริษัท ไฮทีร่า จำกัด <br />
ในปี 2553</p>
				<a href="<?php echo WEB_PATH;?>/aboutus" class="more"></a>
            </div>
            <div class="o clear padTB15">
            
            	<? foreach($product_data as $products){?>
            	<div class="product_home">
                	<h3><a href="<?php echo WEB_PATH;?>/product/product_detail/<?php echo $products["product_id"]?>"><?php echo $products["product_name"]?></a><img src="<?php echo WEB_PATH;?>/assets/images/plus.png" /></h3>
                    <div class="product_pic clear">
                        <a href="<?php echo WEB_PATH;?>/product/product_detail/<?php echo $products["product_id"]?>"><img src="<?php echo WEB_PATH;?>/upload/product/<?php echo $products["product_id"];?>.<?php echo $products["file_type"];?>" /></a>
                    </div>
                    <p><?php echo $products["product_intro"]?></p>
                    <a href="<?php echo WEB_PATH;?>/product/product_detail/<?php echo $products["product_id"]?>" class="more"></a>
                </div>
                <? } ?>
</div>
<script>
$('.bxslider').bxSlider({
  mode: 'fade',
  captions: true,
  auto: true,
  pager:false
  
});
</script>