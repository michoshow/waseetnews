<?php
/**
 * The main Pages template file
 *
 */

get_header();

global $post;


$category_id = get_cat_id( single_cat_title("",false) );


?>
<!-- Start Main Body -->

<div class="CatTitle">
<div class="container">
<div class="row">



<h2 class="Red Right Bold"><? single_cat_title(); ?></h2>
</div><!--row-->
</div><!--container-->
</div><!--CatTitle-->



<div class="container" style="padding:20px 0;">
	
    <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="GoolgeWideAd pull-righ">
                <img src="<? bloginfo('template_url')?>/images/366x280.jpg" />
                </div><!--GoolgeWideAd-->
                <div class="clearfix"></div>
                

<? echo do_shortcode(' [latestnews  mobile="1" tablet="1" desktop="1" num="5" ]الأكثر قراْة[/latestnews]');  ?>
                
    
<? echo do_shortcode(' [multimedia  mobile="1" tablet="1" desktop="1" num="5" ]مالتي ميدي[/multimedia]');  ?>

            
           
           <div class="widget">
             <div class="GoolgeWideAd pull-righ">
                <img src="images/366x280.jpg" />
                </div><!--GoolgeWideAd-->
                <div class="clearfix"></div>
               </div><!--widget-->
                                    
            </div><!--col-md-4-->

    		
            <div class="col-lg-8 col-md-8">
            		
                <? if(have_posts()): while(have_posts()): the_post();
				
					get_template_part('content' , 'categorypost');
	
				 ?>
                
                
               <? endwhile; endif; ?> 

              <?php wp_reset_postdata(); ?>  
              
              <div class="Pagination">
              <?php custom_pagination($the_query->max_num_pages,"",$paged); ?> 
              </div>
  			</div><!--col-md-9-->
            
            
	</div><!--row-->
</div><!--container-->
 

<?php get_footer(); ?>
