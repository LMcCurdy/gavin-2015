<?php $siteURL = "http://www.gavinadvertising.com/alpha/"; ?>
<?php 
    require_once ($_SERVER['DOCUMENT_ROOT'].'/alpha/includes/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
      <?php
        if( ! is_home() ):
          wp_title( '|', true, 'right' );
        endif;
      ?>
    </title>
    <meta name="viewport" content="width=device-width">

    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_url'); ?>/js/html5-3.6-respond-1.1.0.min.js"></script>
    <![endif]-->


<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/normalize.css">
<!-- <link rel="stylesheet" href="assets/css/rwdgrid.css"> -->
<link rel="stylesheet" href="<?php echo $siteURL; ?>assets/css/style.css">

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body class="landing <?php echo $deviceType ?>">

<header class="clearfix main-nav">
        <div id="topnav" class="grid-12">
            <a href="<?php echo $siteURL; ?>work-with-us.php" class="button">Work with Gavin</a>
            <a target="_social" href="//twitter.com/gavinadv"><i class="fa fa-twitter"></i></a>
            <a target="_social" href="//www.facebook.com/GavinAdvertising" ><i class="fa fa-facebook"></i></a>
            <a target="_social" href="//www.linkedin.com/company/gavin-advertising"><i class="fa fa-linkedin"></i></a>
            <a target="_social" href="//plus.google.com/+GavinAdvertisingYork/posts"><i class="fa fa-google-plus"></i></a>
            <a target="_social" href="<?php echo $siteURL; ?>blog/"><i class="fa fa-comments-o"></i></a>
            <a target="_social" href="//www.pinterest.com/gavinadv/"><i class="fa fa-pinterest-p"></i></a>
            <a target="_social" href="//instagram.com/gavinadvertising"><i class="fa fa-instagram"></i></a>
        </div>
        <a href="<?php echo $siteURL; ?>"><h1 class="grid-6"><em>Gavin</em><sup>&trade;</sup> Advertising</h1></a>  
        <nav class="grid-6">

            <ul>
                
                <li><a href="<?php echo $siteURL; ?>our-work/"><span>Our</span> Work</a></li>
                <li><a href="<?php echo $siteURL; ?>expertise.php">Expertise</a></li>
                <li><a href="#">Approach</a></li>
                <li><a href="<?php echo $siteURL; ?>meet-the-team.php">Team</a></li>
                <li><a href="<?php echo $siteURL; ?>about-gavin-advertising.php">About</a></li>
                <li><a href="<?php echo $siteURL; ?>contact-us.php">Contact</a></li>
                <li class="stickyness"><a href="<?php echo $siteURL; ?>work-with-gavin.php" class="button">Work with Gavin</a></li> 
            </ul>
        </nav>
    </header>






