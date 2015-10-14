<div class="clearfix" style="height:20px;"></div>
</div><!-- AllContent -->

<footer>
 
<nav class="FooterMenu">

<div class="menu-test-container">

	
    <?
	
	$args = array(
		'theme_location'  => 'footer_menu',
		'menu' => 'footer_menu' 
	);
		
	wp_nav_menu($args); ?>



</div>
</nav><!--FooterMenu-->
 
 
         <div class="container">
                 <div class="row"  style="margin-top:30px;">
                    	
                         <div class="col-lg-3 col-md-3">
                         <div class="FooterLogoCont">
                        	<a href="#"><img src="<? bloginfo('template_directory') ?>/images/logo.png"  /></a>
                            <h6 class="Normal White"><? strip_tags(bloginfo('description')); ?></h6>
                            <p class="Normal White">جميع الحقوق محفوظة لمجلة طرح البحر <?=date('Y')?></p>
                         </div> <!--FooterLogoCont-->
                        </div> 
                        
                       <div class="col-lg-5 col-md-5"></div>
                        
                        <div class="col-lg-4 col-md-4">
                            <div class="searchCont">
                            	<form>
                                <table cellpadding="0" cellspacing="0" style="width:100%;">
                                <tr>
                                <td>
                                <input type="text" class="SearchInput" name="search" placeholder="بحث في الموقع" />
                                <td>
                                <td>
                                <input type="submit" class="Searchsubmit"  value="" />
                                </td>
                                </tr>
                                </table>
                                </form>
                            </div><!--searchCont-->
                        </div>
                       
                        
                 </div><!--row-->
         </div><!--container-->
 
</footer>   
   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/jquery-1.11.2.min.js"></script>
   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/bootstrap.min.js"></script>
   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/plugins.js"></script>
   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>



    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    
     <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/imgLiquid-min.js"></script>
    <script>  
    ( function( $ ) {
    $(".Fill").imgLiquid({fill:true});
	 } )( jQuery );  // end of all
    </script>
    
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d7936de245e475c" async></script>
    
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.colorbox-min.js"></script>

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.sticky.js"></script>

    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.flexverticalcenter.js"></script>
  
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/js.js"></script>
        
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
<?php wp_footer(); ?>

    </body>
</html>



