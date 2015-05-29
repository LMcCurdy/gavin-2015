<?php
// Define variables for SEO
$pageTitle = 'Work With Gavin Advertising'; // Title of page //
$pageDescription = ''; // Title of page //
$pageCanonical = 'http://www.gavinadvertising.com/work-with-us.php';
// If we don't want the search engines to see our website just yet
//$pageRobots = 'noindex,nofollow';
include('includes/header.php') // Include header file //
?>
<body class="landing <?php echo $deviceType ?>">
	<?php include('includes/nav.php'); ?>
	
<div id="introduction" class="intro-no">
<h1><span>Awesome, You Want To Work With Us</span>We’re Excited!</h1>
<hr />
<p class="fade-me">Help us help you and tell us a little more about what you’d like to accomplish working with Gavin.</p>
</div>
<form action="work-form.php" class="work" id="contactForm" method="post" name="contact_us"> 
<div class="container">
    <p class="blue-bird fade-me">First Things First</p>
    <h2>Pick Your Project</h2>
</div>


<div class="checkboxes clearfix">

<input id="check-web" type="checkbox" name="project[]" value="Website Design">
    <label for="check-web">Website Design</label>

<input id="check-strategy" type="checkbox" name="project[]" value="Strategy">
    <label for="check-strategy">Strategy</label>

<input id="check-pr" type="checkbox" name="project[]" value="Public Relations">
    <label for="check-pr">Public Relations</label>

<input id="check-design" type="checkbox" name="project[]" value="Design">
    <label for="check-design">Design</label>

</div>

<p class="blue-bird baby fade-me">If more than one applies, by all means select more than one!</p>


<hr />

<div class="container">
    <p class="blue-bird fade-me">Secondly, Let’s Define Your</p>
    <h3>Project Goals</h3>
</div>

<div class="checkboxes clearfix">

<input id="check-leads" type="checkbox" name="goals[]" value="Lead Generation">
    <label for="check-leads">Lead Generation</label>

<input id="check-ue" type="checkbox" name="goals[]" value="User Experience">
    <label for="check-ue">User Experience</label>

<input id="check-br" type="checkbox" name="goals[]" value="Brand Recognition">
    <label for="check-br">Brand Recognition</label>

<input id="check-org" type="checkbox" name="goals[]" value="Internal Communications">
    <label for="check-org">Internal Comm.</label>

</div>

<p class="blue-bird baby fade-me">Want more than one? Surprise! You can select multiple items.</p>


<hr />


<div class="container">
    <p class="blue-bird fade-me">Number Three, Tell Us Your</p>
    <h4>Project Details</h4>
</div>

<div class="project-details">

<p>You’d like your project to begin no later than:</p>
<input type="text" name="startdate" placeholder="Month | Year" />

<p>You’d like your project to be completed no later than:</p>
<input type="text" name="enddate" placeholder="Month | Year" />

<textarea name="projectdetails" placeholder="Tell us a little bit about your project"></textarea>



</div>




<hr />


<div class="container">
    <p class="blue-bird fade-me">Last, But Not Least,</p>
    <h4>Who Are You</h4>
</div>

<div class="project-details personal-details">

<input type="text" name="firstname" placeholder="First Name*" required />

<input type="text" name="lastname" placeholder="Last Name*" required />

<input type="text" name="company" placeholder="Company Name*" required />

<input type="email" name="email" placeholder="Email*" required />

<input type="text" name="phone" onKeyPress="javascript:return maskInput(this.value,this,'3,7','-');" onblur="javascript:return maskInput(this.value,this,'3,7','-');" maxlength="12" placeholder="Phone Number*" required />

<input type="text" name="besttime" placeholder="Best Time To Reach You" />

<p>Prove you’re human; 2 + 2 =</p>
<input type="captcha" name="captcha" class="captcha_input" placeholder="Hint: It might be 4" captcha/> 

<div class="message"><div class="alert"></div></div> 
<input type="submit" name="Submit" value="Let’s Get To Work" /> 

</div>






</form>


	<?php include('includes/footer.php'); ?>
</body>
</html>