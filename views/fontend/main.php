<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $page_title?></title>
<style>
 	/*reset*/
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,sub,sup,tt,var,b,u,i,center,dl,dt,dd,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}table{border-collapse:collapse;border-spacing:0}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/style_slide.css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/js/bxslider/jquery.bxslider.css" />

<style>
li	{ display: list-item }
h4, p,
blockquote, ul,
fieldset, form,
ol, dl, dir,
menu            { margin: 1.12em 0 }
</style>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/enscroll.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/flexslider.css" />
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.flexslider-min.js"></script>
-->
</head>
<body class="bg_body">
<div id="warper">
	<div id="container">
    	<div id="header">
        	<div id="headerlogo"><img src="<?php echo WEB_PATH;?>/assets/images/headerlogo.jpg" /></div>
            <div id="header_nav">
            	<div>
            		<!--
                	<form class="input_set">
                    	<input type="text" placeholder="Search On Website"/><input type="submit" value="Search" />
                    </form>
                   -->
                </div>
                <div class="clear">
                    <ul id="nav">
                        <li><a href="<?php echo WEB_PATH;?>/home/main">หน้าแรก</a></li>
                        <li><a href="<?php echo WEB_PATH;?>/product">สินค้าและบริการ</a></li>
                        <li><a href="<?php echo WEB_PATH;?>/ourwork">ผลงาน</a></li>
                        <li><a href="<?php echo WEB_PATH;?>/ourteam">ทีมงาน</a></li>
                        <li><a href="<?php echo WEB_PATH;?>/workwithus">ร่วมงานกับเรา</a></li>
                        <li><a href="<?php echo WEB_PATH;?>/aboutus">เกี่ยวกับเรา</a></li>
                        <li><a href="<?php echo WEB_PATH;?>/contactus">ติดต่อเรา</a></li>
                    </ul>
                </div>
            </div>
        </div><!--End Header-->
        <div id="main">
			<? echo $page_body;?>
        </div><!--End Main-->
    </div><!--End Container-->
    <div id="footer">
    	<div id="footer_inner">
        	<!--<div id="social">
            	<div class="social_h">ติดตามพวกเราได้ที่</div>
                <div class="social_icon">
                	<a href="#" class="s_facebook"></a>
                    <a href="#" class="s_twitter"></a>
                    <a href="#" class="s_google"></a>
                    <a href="#" class="s_youtube"></a>
                </div>
            </div>-->
            <div class="footer_c">
            	<div id="footer_menu">
                    <div style="text-align:center;background:#fff;">
                        <img src="<?php echo WEB_PATH;?>/assets/images/headerlogo.jpg" width="80%" />
                    </div>
                </div>
                <div id="footer_menu">
                    <div class="pad15">
                        
                        <h2><a href="<?php echo WEB_PATH;?>/home/main">หน้าแรก</a></h2>
                        <h2><a href="<?php echo WEB_PATH;?>/product">สินค้าและบริการ</a></h2>
                        <h2><a href="<?php echo WEB_PATH;?>/ourwork">ผลงาน</a></h2>
                        <h2><a href="<?php echo WEB_PATH;?>/ourteam">ทีมงาน</a></h2>
                        
                    </div>
                </div>
            	<div id="footer_menu">
                    <div class="pad15">
                        <h2>เพิ่มเติม</h2>
                         <p>
                         	<a href="<?php echo WEB_PATH;?>/aboutus">เกี่ยวกับเรา</a>
                         </p>
                    </div>
                </div>
                <div id="footer_menu">
                    <div class="pad15">
                        <h2>ช่วยเหลือ</h2>
                        <p>
                            <a href="<?php echo WEB_PATH;?>/sitemap">แผนผังเว็บไซต์</a><br />
                            <a href="<?php echo WEB_PATH;?>/contactus">ติดต่อเรา</a>
                        </p>
                    </div>
                </div>
            </div>
            <div id="footer_location">
            	<div class="location">
                	<h1>HITERA CO.,LTD.</h1>
449 & 451 Somdejphapinklao Road
Bangyeekhan, Bangplad, Bangkok 10700
                </div>
                <div class="contact">
                	<div class="tel">0-2434-0040,50</div>
                    <div class="fax">0-2433-3971</div>
                </div>
            </div>
        </div><!--End Footer_inner-->
    </div><!--End Footer-->
</div><!--End Warper-->
</body>
</html>
