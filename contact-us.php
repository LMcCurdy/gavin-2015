<?php
// Define variables for SEO
$pageTitle = 'Contact Us | Gavin Advertising'; // Title of page //
$pageDescription = 'Contact Gavin Advertising, a full service marketing agency in York, PA, today to start your next PR, Branding & Design, or Digital project today!'; // Title of page //
$pageCanonical = 'http://www.gavinadvertising.com/contact-us.php';
// If we don't want the search engines to see our website just yet
//$pageRobots = 'noindex,nofollow';
include('includes/header.php') // Include header file //
?>
<body class="landing <?php echo $deviceType ?>">
	<?php include('includes/nav.php'); ?>
	
<div id="introduction" class="intro-no contact-banner clearfix">
<h1><span>Don't Be Shy, We'd Love To</span>Talk To You</h1>
<hr />
<div class="contact-form-con">
<form action="contact-page-form.php" id="contactForm" method="post" name="contact_us"> 
  
  
<input type="text" name="name" placeholder="Full Name*" required />

<input type="text" name="company" placeholder="Company Name" />  
  

  
<input type="email" name="email"  placeholder="Email*" required /> 


<input type="text" name="phone" onKeyPress="javascript:return maskInput(this.value,this,'3,7','-');" onblur="javascript:return maskInput(this.value,this,'3,7','-');" maxlength="12" placeholder="Phone Number*" required />
  

<textarea name="comments" cols="" rows="3" placeholder="Leave your comments, questions, or concerns here."></textarea>

  <input type="captcha" name="captcha" class="captcha_input" placeholder="2 + 2 = ?*" captcha /> 
  
<div class="message"><div class="alert"></div></div> 
<input type="submit" name="Submit" value="Submit" /> 


  
</form>
</div>
</div>




<div class="contact-home clearfix">

<div class="grid-6">
<div class="videoWrapper">
<iframe src="https://mapsengine.google.com/map/u/0/embed?mid=z8r2UX_SSKu8.k0UKYJNb_irs" width="640" height="480"></iframe>
</div>
</div>

<div class="grid-6 footer-contact">
<div class="contact-gavin">
<p>328 W. Market St.<br />York PA 17401</p>
<p>O: (717) 848-8155<br />F: (717) 855-2292</p>
<p><a href="mailto:gavin@gavinadv.com">gavin@gavinadv.com</a></p>

<div id="g-work">
		<div id="abox" class="abox"></div>
		<a href="<?php echo $siteURL; ?>work-with-us.php" class="button">Work With Gavin</a>
</div>
</div>
</div>

</div>







	<?php include('includes/footer.php'); ?>
</body>
</html>