<?php $siteURL = "http://www.gavinadvertising.com/"; ?>
<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/Mobile_Detect.php');
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
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?php echo $pageTitle; ?></title>
	<meta name="description" content="<?php echo $pageDescription; ?>" />
	<?php
	if($pageCanonical)
		echo '<link rel="canonical" href="'.$pageCanonical.'">';
	?>
	<meta name="viewport" content="width=device-width" />

<?php
// 	<link rel="stylesheet" href="/assets/css/normalize.css" />
// 	<link rel="stylesheet" href="/assets/css/style.css">
?>


	<link type="text/css" rel="stylesheet" href="/min/b=assets/css&amp;f=normalize.css" />
	<link type="text/css" rel="stylesheet" href="/assets/owl/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="/assets/owl/owl.theme.css" />
	<link type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
	<!-- <link type="text/css" rel="stylesheet" href="/min/b=assets/css&amp;f=style.css" /> -->
	<link rel="stylesheet" href="/assets/css/style.css">
</head>