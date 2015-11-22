<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $page_title?></title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH;?>/assets/css/admin.css" />
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH;?>/assets/css/jquery.ui.theme/jquery-ui.min.css" />
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH;?>/assets/css/jquery.dataTables.css" />
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH;?>/assets/css/validate.css" />
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH;?>/assets/js/file_upload/css/jquery.fileupload.css" />
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH;?>/assets/js/file_upload/css/jquery.fileupload-ui.css" />


<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.min.js"></script>
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/tiny_mce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/tiny_mce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/file_upload/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/file_upload/js/jquery.fileupload.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/file_upload/js/jquery.fileupload-process.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/file_upload/js/jquery.fileupload-image.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/file_upload/js/jquery.fileupload-audio.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/file_upload/js/jquery.fileupload-video.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/file_upload/js/jquery.fileupload-validate.js"></script>

</head>
<body>
<div id="warper">
	<div id="container_outer">
    	<div id="header">
        	<div id="header_inner">
            	<div id="logo"><a href="#"><img src="<?php echo WEB_PATH;?>/assets/images/logo.jpg" /></a></div>
                <div id="headerR"></div>
            </div>
        </div>
        <div id="nav">
            <ul>
                <li><a href="<?php echo WEB_PATH;?>/backend/admin/main">หน้าแรก</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/admin">ผู้ดูแลระบบ</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/slide/">สไลด์โชว์</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/product/">สินค้าและบริการ</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/ourwork/">ผลงาน</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/ourteam/">ทีมงาน</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/career/">จัดการตำแหน่งงาน</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/application/">จัดการผู้สมัครงาน</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/aboutus/">เกี่ยวกับเรา</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/contactus/">ติดต่อเรา</a></li>
                <li><a href="<?php echo WEB_PATH;?>/backend/admin/doLogout">ออกจากระบบ</a></li>
            </ul>
        </div>
        <div id="main">
        	<h3 class="borB"><? echo $page_title?></h3>
            <div class="main_con">
            <? echo $page_body;?>
            </div>
        </div>
    </div>
	<div id="footer">Copyright @ 2014 HITERA.COM All Right Reserved including text, graphics, interfaces and design thereof are all rights reserved.</div>
</div>


</body>
</html>