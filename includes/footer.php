<footer>

<div class="clearfix">

<div class="grid-4 logo-foot">
<p class="f-gav"><em>Gavin</em><sup>&trade;</sup> Advertising</p>
</div>

<div class="grid-4 padding-f blog-feed">
<h4>Recent Blog Post</h4>

<!-- DELETE THE HTML BELOW WHEN THE SITE GOES LIVE & UNCOMMENT THE RSS PHP CODE -->

<p><strong>Microsoft Does Cool Things To W10</strong>
<span>With the official announcement of Windows 10 and a bunch of new products Microsoft is still worse than Apple. Last year Apple made...</span>
<a href="#">Read More</a>
</p>

<p><strong>Gavin Hires Awesome Magician</strong>
<span>Gavin hired another cool web developer last week. Little did they know he was an awesome magician who, on a daily basis would perform card tricks...</span>
<a href="#">Read More</a>
</p>

<p><strong>Orange is The New Black</strong>
<span>A picture is making its rounds on social media this morning. The picture is of the walls in the Gavin offices. The question is, are they orange or gold?</span>
<a href="#">Read More</a>
</p>



<!-- BLOG POST CAN'T BE PULLED UNTIL THE SITE IS LIVE!! 
<?php
	$rss = new DOMDocument();
	$rss->load('http://www.gavinadvertising.com/in-the-hall/feed/');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 5;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		echo '<p><strong>'.$title.'</strong>';
		echo '<span>'.$description.'</span>';
		echo '<a href="'.$link.'" title="'.$title.'">Read More</a></p>';
	}
?> -->
</div>

<div class="grid-4 padding-f social">
<h4>Find Us on Social Media</h4>

<a href="#"><div class="round"><i class="fa fa-twitter"></i></div> @gavinadv</a>
<a href="#"><div class="round"><i class="fa fa-facebook"></i></div> facebook.com/gavinadvertising</a>
<a href="#"><div class="round"><i class="fa fa-linkedin"></i></div> linkedin.com/company/gavin-advertising</a>
<a href="#"><div class="round"><i class="fa fa-google-plus"></i></div> plus.google.com/+GavinAdvertisingYork</a>
<a href="#"><div class="round"><i class="fa fa-instagram"></i></div> @gavinadvertising</a>
<a href="#"><div class="round"><i class="fa fa-pinterest"></i></div> gavin advertising</a>

</div>



</div><!-- END OF FOOTER WRAPPER -->
</footer>

<div class="second-footer">
<div class="wrap">
<p>328 W. Market St, York PA 17401 | (717) 848-8155 | &copy; <?php echo date('Y'); ?> Gavin Advertising. All Rights Reserved</p>
</div>
</div>




















<!-- SCRIPTS **********************************************-->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/jquery.lazylinepainter-1.5.1.min.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/svgs.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/scripts.js"></script>

<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
