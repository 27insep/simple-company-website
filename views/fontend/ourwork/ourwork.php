<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<title>Showcase | Adobe Business Catalyst</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link href="http://www.businesscatalyst.com/StyleSheets/ModuleStyleSheets.css" type="text/css" rel="StyleSheet" />

<style>
.bx-wrapper, .bx-viewport {
    height: 400px !important; //provide height of slider
}
.bx-viewport ul li img
{
	height: 280px;
}
.bx-wrapper .bx-viewport{
	border:none;
	left:0;
	box-shadow:none;
}
</style>
<script type="text/javascript">var jslang='EN';</script>
<script src="http://www.businesscatalyst.com//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://www.businesscatalyst.com/js/libs/modernizr-1.7.min.js"></script>
<script src="http://www.businesscatalyst.com/js/respond.min.js"></script>
<script type="text/javascript" src="http://www.businesscatalyst.com//use.typekit.net/rmt0ffy.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<meta charset="utf-8" />
<meta name="author" value="Adobe Business Catalyst" />
<meta content="on" http-equiv="cleartype" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- Base CSS -->
<!-- CSS by Screen Size -->
<!-- Base JS -->
<!-- Typekit -->
</head>
<body id="page-showcase" class="page-showcase">
        <div class="pale background">
        <div id="wrapper">
			<div class="h_ourwork">ผลงานที่ผ่านมา</div>
            <ul id="slider">
				<?php foreach($data as $ourwork){?>
                <li class="slide">
                    <a href="<?php echo WEB_PATH;?>/ourwork/ourwork_detail/<?php echo $ourwork["ourwork_id"];?>">
                        <img alt="<?php echo $ourwork["ourwork_name"];?>" src="<?php echo $ourwork["ourwork_image"];?>" />
                    </a>
                    <div class="quote">
                        <h2><?php echo $ourwork["ourwork_name"];?></h2>
                        <p><?php echo $ourwork["ourwork_intro"];?>
                        	<a href="<?php echo WEB_PATH;?>ourwork/ourwork_detail/<?php echo $ourwork["ourwork_id"];?>">อ่านต่อ</a>
                        </p>
                    </div>
                </li>
                <?php } ?>
				<!--
                <li class="slide">
                    <a href="http://www.businesscatalyst.com/showcase/holiday-valley">
                        <img alt="Holiday Valley" src="http://www.businesscatalyst.com/img/showcase-holiday-valley.jpg" />
                    </a>
                    <div class="quote">
                        <h2>Holiday Valley</h2>
                        <p>&ldquo;Business Catalyst is the ideal solution for wrapping all our clients’ requirements into powerful, integrated self-service business and web marketing tools.&rdquo; </p>
                    </div>
                </li>

                <li class="slide">
                    <a href="http://www.businesscatalyst.com/showcase/breckenridge-brewery">
                        <img alt="Breckenridge Brewery" src="http://www.businesscatalyst.com/img/showcase-breckenridge-brewery.jpg" />
                    </a>
                    <div class="quote">
                        <h2>Breckenridge Brewery</h2>
                        <p>&ldquo;The new Breckenridge Brewery site has transformed the way the company does business.&rdquo;</p>
                    </div>
                </li>

                <li class="slide">
                    <a href="http://www.businesscatalyst.com/showcase/san-francisco-zoo">
                        <img alt="San Francisco Zoo" src="http://www.businesscatalyst.com/img/showcase-san-francisco-zoo.jpg" />
                    </a>
                    <div class="quote">
                        <h2>San Francisco Zoo</h2>
                        <p>&ldquo;Not having to worry about learning how to make changes to HTML or CSS lets other team members get more involved.&rdquo;</p>
                    </div>
                </li>

                <li class="slide">
                    <a href="http://www.businesscatalyst.com/showcase/simpleflame-hollyburn-properties">
                        <img alt="Hollyburn Properties" src="http://www.businesscatalyst.com/img/showcase-hollyburn-properties.jpg" />
                    </a>
                    <div class="quote">
                        <h2>Hollyburn Properties by SimpleFlame</h2>
                        <p>&ldquo;When clients see how much the platform can do and how cost-effective it is, ideas begin to flow and projects rapidly take shape.&rdquo;</p>
                    </div>
                </li>

                <li class="slide">
                    <a href="http://www.businesscatalyst.com/showcase/tinymill">
                        <img alt="tinymill" src="http://www.businesscatalyst.com/img/showcase-tinymill.jpg" />
                    </a>
                    <div class="quote">
                        <h2>tinymill</h2>
                        <p>&ldquo;We chose to build our business on the Adobe Business Catalyst platform because it offers a hosted, all-in-one solution for consistently managing projects across client sites.&rdquo; </p>
                    </div>
                </li>

                <li class="slide">
                    <a href="http://www.businesscatalyst.com/showcase/chicago-digital">
                        <img alt="Chicago Digital" src="http://www.businesscatalyst.com/img/showcase-chicago-digital.jpg" />
                    </a>
                    <div class="quote">
                        <h2>Chicago Digital</h2>
                        <p>&ldquo;With Adobe Creative Cloud, we can quickly and easily add employees to projects as needed, keeping us focused on delivering great results for clients, rather than worrying about costs.&rdquo; </p>
                    </div>
                </li>

                <li class="slide">
                    <a href="http://www.businesscatalyst.com/showcase/bosweb-systems">
                        <img alt="Bosweb Systems" src="http://www.businesscatalyst.com/img/showcase-bosweb-systems.jpg" />
                    </a>
                    <div class="quote">
                        <h2>Bosweb Systems</h2>
                        <p>&ldquo;The all-in-one functionality allowed us to begin transitioning away from a production shop and toward more of a partner and solutions provider to our clients.&rdquo; </p>
                    </div>
                </li>
			-->
            </ul>

        </div>


            <script type="text/javascript" language="javascript" src="http://www.businesscatalyst.com/js/jquery.bxslider.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#slider').bxSlider({
                    auto: true,
                    minSlides: 3,
                    maxSlides: 5,
                    moveSlides: 1,
                    slideWidth: 900,
                    slideMargin: 20
                });
            });
            </script>
        </div>
<script type="text/javascript" src="http://www.businesscatalyst.com/js/OmnitureSCode.js"></script>
<script type="text/javascript" src="http://www.businesscatalyst.com/js/OmnitureTrackerLibrary.js"></script>
<script type="text/javascript" src="http://www.businesscatalyst.com/js/OmnitureTracking.js"></script>
<script type="text/javascript">

	var trackingData = {};
	trackingData.channel = "Business Catalyst"
	trackingData.pageName = "Business Catalyst > showcase";

	var t = createDefaultOmnitureTracker();
	t.track();
	
</script>
    
</body>
</html>