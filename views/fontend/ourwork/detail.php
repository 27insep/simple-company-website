<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<style>
 	/*reset*/
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,sub,sup,tt,var,b,u,i,center,dl,dt,dd,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}table{border-collapse:collapse;border-spacing:0}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/style.css" />
<style>
li	{ display: list-item }
h4, p,
blockquote, ul,
fieldset, form,
ol, dl, dir,
menu            { margin: 1.12em 0 }
*{
	 box-sizing: content-box
}
</style>
<div id="main_all">
	<!--
            <div id="mainL">
            	<ul class="navL">
            		<? foreach($data as $ourwork_data){?>
                		<li><a href="<?php echo WEB_PATH;?>/ourwork/ourwork_detail/<?=$ourwork_data["ourwork_id"]?>" class="curve4 <?php if($ourwork_data["ourwork_id"]==$ourwork_id) echo "active";?>"><?php echo $ourwork_data["ourwork_name"];?> <i class="icon_bul"></i></a></li>
                    <? } ?>
                </ul>
            </div>
	-->
<!--End MainL-->
            <div id="mainFull" style="position: relative">
            	<!-- Single button -->
<div class="btn-group" style="float: right;margin: 0 15px 0 0;">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <?php echo $ourwork_name;?> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu pull-right" role="menu">
  	<? foreach($data as $ourwork_data){?>
                		<li><a href="<?php echo WEB_PATH;?>/ourwork/ourwork_detail/<?=$ourwork_data["ourwork_id"]?>" class="curve4 <?php if($ourwork_data["ourwork_id"]==$ourwork_id) echo "active";?>"><?php echo $ourwork_data["ourwork_name"];?> <i class="icon_bul"></i></a></li>
    <? } ?>
    </ul>
</div>
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