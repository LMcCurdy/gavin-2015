<?php
// Define variables for SEO
$pageTitle = 'Our Work | Gavin Adverting'; // Title of page //
$pageDescription = ''; // Title of page //
$pageCanonical = 'http://www.gavinadvertising.com/our-work/';
// If we don't want the search engines to see our website just yet
//$pageRobots = 'noindex,nofollow';
include('../includes/header.php') // Include header file //
?>
<body class="landing <?php echo $deviceType ?>">
	<?php include('../includes/nav.php'); ?>
	<div id="video">
		<a href="#" class="pause"><i class="fa fa-stop"></i></a>
		<div class="grid-12">
<ul id="icon-wrap" class="menu clearfix">
    <li class="toggle1 active" onClick="Animate2id('#box1');"></li>
    <li class="toggle2" onClick="Animate2id('#box2');"></li>
    <li class="toggle3" onClick="Animate2id('#box3');"></li>
    <li class="toggle4" onClick="Animate2id('#box4');"></li>
</ul>
		</div>
		<video autoplay loop poster="../assets/video/placeholder.png" width="100%" height="auto">
			<!-- .mp4 file for native playback in IE9+, Firefox, Chrome, Safari and most mobile browsers -->
			<source src="../assets/video/placeholder.mp4" type="video/mp4" />
			<source src="../assets/video/placeholder.webmhd.webm" type="video/webm" />
			<!-- flash fallback for IE6, IE7, IE8 and Opera -->
			<object type="application/x-shockwave-flash"
					data="../assets/video/swf/flowplayer-3.2.18.swf" 
					width="100%" height="auto">
				<param name="movie" value="../assets/video/swf/flowplayer-3.2.18.swf" />
				<param name="allowFullScreen" value="true" />
				<param name="wmode" value="transparent" />
				<!-- note the encoded path to the image and video files, relative to the .swf! -->
				<!-- %2F = slash -->
				<param name="flashVars"
					   value="config={'playlist':['..%2Fplaceholder.png',
									 {'url':'..%2Fplaceholder.mp4','autoPlay':true}]}" />
				<!-- fallback image if flash fails -->
				<img src="../assets/video/placeholder.png" width="100%" height="auto" title="No Flash found" alt="" />
			</object>
		</video>			
	</div>


<div class="container">

<!-- Public Relations -->
    <div class="toggle1">
    <p class="blue-bird fade-me">Take A Look At Our Work In</p>
    <h1>Public Relations</h1>
    <hr class="fade-me" />
    <p class="work-blurb fade-me">We build influence. With more than $10,000,000 in media equivalency value for our clients, our team is the go-to for brands looking to build trust through strategically consistent exposure across every media channel imaginable.</p>
    <p class="categories fade-me"><span>Crisis Communications</span> <i class="fa fa-circle"></i> <span>Strategy</span> <i class="fa fa-circle"></i> <span>Media Coverage</span> <i class="fa fa-circle"></i> <span>Building Influence</span></p>

    <div id="blocks" class="clearfix pr-blocks">
<a href="http://www.yti.edu/" target="_blank"><div id="ytici"><div><hr class="fade-me" /><p>YTI Career Institute</p><span>Learn More Here</span></div></div></a>
<a href="https://www.porterchester.com/" target="_blank"><div id="pci"><div><hr class="fade-me" /><p>Porter and Chester Institute</p><span>Learn More Here</span></div></div></a>
<a href="http://www.familyfirsthealth.org/" target="_blank"><div id="ffh"><div><hr class="fade-me" /><p>Family First Health</p><span>Learn More Here</span></div></div></a>
<a href="http://truenorthwellness.org/" target="_blank"><div id="tws"><div><hr class="fade-me" /><p>TrueNorth Wellness Services</p><span>Learn More Here</span></div></div></a>
<a href="http://www.yorkcpc.org/" target="_blank"><div id="cpc"><div><hr class="fade-me" /><p>Community Progress Council</p><span>Learn More Here</span></div></div></a>
<a href="http://www.restaurantweekyork.com/" target="_blank"><div id="ycrw"><div><hr class="fade-me" /><p>York County (Restaurant Week)</p><span>Learn More Here</span></div></div></a>
<a href="http://www.wyndridge.com/" target="_blank"><div id="whc"><div><hr class="fade-me" /><p>Wyndridge Hard Cider</p><span>Learn More Here</span></div></div></a>
<a href="http://www.trespa.com/us/" target="_blank"><div id="trespa-pr"><div><hr class="fade-me" /><p>Trespa</p><span>Learn More Here</span></div></div></a>
<a href="http://www.peoplesbanknet.com/default.aspx" target="_blank"><div id="pb"><div><hr class="fade-me" /><p>PeoplesBank</p><span>Learn More Here</span></div></div></a>
<a href="http://www.wolfgangcandy.com/" target="_blank"><div id="wc"><div><hr class="fade-me" /><p>Wolfgang Candy</p><span>Learn More Here</span></div></div></a>
<a href="http://www.ycds.org/" target="_blank"><div id="ycds"><div><hr class="fade-me" /><p>York County Day School</p><span>Learn More Here</span></div></div></a>
<a href="http://richardsenergy.com/" target="_blank"><div id="re"><div><hr class="fade-me" /><p>Richards Energy</p><span>Learn More Here</span></div></div></a>
<a href="http://www.shopwestmanchestermall.com/mall/index_home.aspx" target="_blank"><div id="wmm"><div><hr class="fade-me" /><p>West Manchester Mall</p><span>Learn More Here</span></div></div></a>
<a href="http://www.glatfelters.com/" target="_blank"><div id="gig-pr"><div><hr class="fade-me" /><p>Glatfelter Insurance Group</p><span>Learn More Here</span></div></div></a>
<a href="http://www.yccf.org/" target="_blank"><div id="yccf"><div><hr class="fade-me" /><p>York County Community Foundation</p><span>Learn More Here</span></div></div></a>
<a href="#" target="_blank"><div id="nhacs"><div><hr class="fade-me" /><p>New Hope Academy Charter School</p><span>Learn More Here</span></div></div></a>
<a href="#" target="_blank"><div id="attc"><div><hr class="fade-me" /><p>Arts To The Core</p><span>Learn More Here</span></div></div></a>

	</div>
    </div>
<!-- Market Strategy -->
    <div class="toggle2">
    <p class="blue-bird fade-me">Take A Look At Our Work In</p>
    <h2>Market Strategy</h2>
    <hr class="fade-me" />
    <p class="work-blurb fade-me">We investigate market opportunities for growth and expansion. From focus groups to secondary research and team-building activities, our team crafts effective messaging platforms with complete implementation plans.</p>
    <p class="categories fade-me"><span>Research</span> <i class="fa fa-circle"></i> <span>Messaging</span> <i class="fa fa-circle"></i> <span>Brand Engagement</span> <i class="fa fa-circle"></i> <span>Market Approach</span></p>
    <div id="blocks" class="clearfix pr-blocks">
<a href="https://potatorolls.com/" target="_blank"><div id="martin-b"><div><hr class="fade-me" /><p>Martin's</p><span>Learn More Here</span></div></div></a>
<a href="http://www.kunzler.com/index.asp" target="_blank"><div id="kunzler-b"><div><hr class="fade-me" /><p>Kunzler</p><span>Learn More Here</span></div></div></a>
<a href="http://carminacristina.com/" target="_blank"><div id="carmina"><div><hr class="fade-me" /><p>Carmina Cristina Make-up</p><span>Learn More Here</span></div></div></a>
<a href="http://leboskincare.com/" target="_blank"><div id="lebo"><div><hr class="fade-me" /><p>Lébo Skin Care Center</p><span>Learn More Here</span></div></div></a>
<a href="http://sebuilding.com/" target="_blank"><div id="se"><div><hr class="fade-me" /><p>SE Building Materials</p><span>Learn More Here</span></div></div></a>
<a href="https://www.facebook.com/HNExteriors" target="_blank"><div id="hammer-a"><div><hr class="fade-me" /><p>Hammer and Nail Exteriors</p><span>Learn More Here</span></div></div></a>
<a href="http://www.avimarvin.com/knowyourwindows" target="_blank"><div id="window-b"><div><hr class="fade-me" /><p>KnowYourWindows.com</p><span>Learn More Here</span></div></div></a>

		<a href="http://www.familyfirsthealth.org/" target="_blank"><div id="ffh"><div><hr class="fade-me" /><p>Family First Health</p><span>Learn More Here</span></div></div></a>
<a href="http://truenorthwellness.org/" target="_blank"><div id="tws"><div><hr class="fade-me" /><p>TrueNorth Wellness Services</p><span>Learn More Here</span></div></div></a>
<a href="http://www.trespa.com/us/" target="_blank"><div id="trespa-pr"><div><hr class="fade-me" /><p>Trespa</p><span>Learn More Here</span></div></div></a>
<a href="http://www.glatfelters.com/" target="_blank"><div id="gig-pr"><div><hr class="fade-me" /><p>Glatfelter Insurance Group</p><span>Learn More Here</span></div></div></a>
<a href="http://www.yorkcpc.org/" target="_blank"><div id="cpc"><div><hr class="fade-me" /><p>Community Progress Council</p><span>Learn More Here</span></div></div></a>
<a href="http://www.ycds.org/" target="_blank"><div id="ycds"><div><hr class="fade-me" /><p>York County Day School</p><span>Learn More Here</span></div></div></a>
<a href="#" target="_blank"><div id="nhacs"><div><hr class="fade-me" /><p>New Hope Academy Charter School</p><span>Learn More Here</span></div></div></a>
	</div>
    </div>
<!-- Branding and Design -->
    <div class="toggle3">
    	<p class="blue-bird fade-me">Take A Look At Our Work In</p>
    <h3>Branding &amp; Design</h3>
    <hr class="fade-me" />
    <p class="categories fade-me"><span>Identity</span> <i class="fa fa-circle"></i> <span>Brand Consistency</span> <i class="fa fa-circle"></i> <span>Video &amp; Animation</span> <i class="fa fa-circle"></i> <span>Print</span> <i class="fa fa-circle"></i> <span>Design</span></p>
    <div id="blocks" class="clearfix">
		<a href="#"><div id="martins"><div><hr class="fade-me" /><p>Martin’s</p><span>All that and a bag of rolls</span></div></div></a>
		<a href="#"><div id="trespa"><div><hr class="fade-me" /><p>Trespa</p><span>Strategic Sales and Marketing</span></div></div></a>
		<a href="#"><div id="truenorth"><div><hr class="fade-me" /><p>True North Wellness</p><span>Branding for Healthcare Consumerism</span></div></div></a>
	</div>
    </div>
<!-- Digital -->
    <div class="toggle4">
   	<p class="blue-bird fade-me">Take A Look At Our Work In</p>
    <h3>Digital</h3>
    <hr class="fade-me" />
    <p class="categories fade-me"><span>Web Design &amp; Development</span> <i class="fa fa-circle"></i> <span>User Experience</span> <i class="fa fa-circle"></i> <span>Mobile</span> <i class="fa fa-circle"></i> <span>Interactive</span> <i class="fa fa-circle"></i> <span>SEO</span></p>
    <div id="blocks" class="clearfix">
		<a href="#"><div id="martins"><div><hr class="fade-me" /><p>Martin’s</p><span>All that and a bag of rolls</span></div></div></a>
		<a href="#"><div id="trespa"><div><hr class="fade-me" /><p>Trespa</p><span>Strategic Sales and Marketing</span></div></div></a>
		<a href="#"><div id="truenorth"><div><hr class="fade-me" /><p>True North Wellness</p><span>Branding for Healthcare Consumerism</span></div></div></a>
	</div>
    </div>

</div>



	<?php include('../includes/footer.php'); ?>
</body>
</html>