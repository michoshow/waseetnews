<?php
/**
 * The template for displaying the header
 *
 */
?>    
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 	<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->



    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><? bloginfo('name') ?>  <? wp_title('||' ,  'true' , 'left'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
		<![endif]-->
    
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/colorbox.css">
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.css" rel="stylesheet" />
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.theme.css" rel="stylesheet" />
        <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.transitions.css" rel="stylesheet" />
        
        
        
	
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Custom LESS File -->
    
    
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/css.css" rel="stylesheet" />  
   
   
    
   <!--[if !IE]>
   
    <![endif]-->
    

  <?php wp_head(); ?>
  </head>
    

<!-- Start Of Header.php -->


<body <?php body_class(); ?>>

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<style>
.Testing{
position:absolute;
top:0;
left:-2px;
z-index:100;	
}
</style>
<div class="Testing"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/testing.png" /></div>

<div class="LatestNews">

    <div class="container">
        <div class="row">
        	<div class="col-md-3 col-lg-3 SocialIcons"></div><!--SocialIcons-->
            
        	<div class="col-md-9 col-lg-9 LatestNewsLinks">
            
            <h5 class="Bold Red Right pull-right">أحدث الأخبار</h5>
            
            <div class="LatestNewsCont pull-right">
            <a class="White Normal Right">إستئناف الدوري بمنافسات نارية بعد فوز المنتخب الوطني .. و الفرق ترفع شعار لابديل عن الفوز</a>
            </div><!--LatestNewsCont-->
            </div><!--LatestNewsLinks-->
            
        	          
        </div><!--row-->
    </div><!--container-->

</div><!--LatestNews-->

<div id="AllContent">

<header>

<div class="container">
<div class="row">
  
    <div class="col-lg-9 col-md-9 MainGoogleAd">
    <img src="<? bloginfo('template_directory') ?>/images/970x90.jpg" />
    </div> <!--MainGoogleAd-->

  	<div class="col-lg-3 col-md-3 Logo">
    <a href="<?=get_home_url() ?>" class="Logo Center TitleNormal DarkGray">
    <img src="<? bloginfo('template_directory') ?>/images/logo.png" /> <br />
    </a>
    <h6 class="DarkGray" style="padding-top:8px;"><? strip_tags(bloginfo('description')); ?></h6>
    </div><!--Logo-->  
    
</div><!--row-->
</div><!--container-->


</header>

<div class="NewsBoard Center">

<p class="White">رئيس مجلس الإدارة / <span class="Red">مصطفى زغلول</span>&nbsp; &nbsp; &nbsp; &nbsp;  رئيس التحرير / <span class="Red">كـمـال عـامـر</span></p>

</div><!--NewsBoard-->


<nav>

<div class="menu-test-container">


<?	
	$args = array(
		'theme_location'  => 'header_menu',
		'menu' => 'main_menu' 
	);
wp_nav_menu($args);
?>


</div>
</nav>

<!-- End Of Header.php -->

