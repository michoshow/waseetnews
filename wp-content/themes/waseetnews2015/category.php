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


<? echo do_shortcode('[featured mobile="1" tablet="2" desktop="3" num="5" cat="'.$category_id.'" ]'); ?>




<div class="container" style="padding:20px 0;">
	
    <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="GoolgeWideAd pull-righ">
                <img src="<? bloginfo('template_url')?>/images/366x280.jpg" />
                </div><!--GoolgeWideAd-->
                <div class="clearfix"></div>
                
                
                                        
<? echo do_shortcode(' [latestnews  mobile="1" tablet="1" desktop="1" num="5" ]الأكثر قراْة[/latestnews]');  ?>



  <div class="BlackMediaBlock">
			   
                    <div class="BlackWideNewsTitle">
                        <h5 class="Bold White Right">مالتي ميديا</h5>
                    </div><!--BlackWideNewsTitle-->       			
                    
                <div class="MediaBlocks">
                	
                    <div class="MediaBlock Fill">
                   <a href="post.php" class="White">
                   
                    <div class="MediaBlockCont Center VCenter">
                    <p class="Center white Normal">أهداف الجولة 37 من الدوري الممتاز المصري </p>
                    	
                        <ul class="MediaList">
                        <li class="AudioList"></li>
                        <li class="VideoList"></li>
                        <li class="ImagesList"></li>
                        </ul>

                    
                    </div><!--MediaBlockCont-->
                    <img src="uploads/169.jpg" />
                    </a>
                    </div><!--MediaBlock-->
                    
                    
                     <div class="MediaBlock Fill">
                   <a href="post.php" class="White">
                    <div class="MediaBlockCont Center VCenter">
                    <p class="Center white Normal">أهداف الجولة 37 من الدوري الممتاز المصري </p>
                    	
                        <ul class="MediaList">
                        <li class="AudioList"></li>
                        <li class="VideoList"></li>
                        <li class="ImagesList"></li>
                        </ul>

                    
                    </div><!--MediaBlockCont-->
                    <img src="uploads/169.jpg" />
                    </a>
                    </div><!--MediaBlock-->
                    
                    
                    
                     <div class="MediaBlock Fill">
                   <a href="post.php" class="White">
                    <div class="MediaBlockCont Center VCenter">
                    <p class="Center white Normal">أهداف الجولة 37 من الدوري الممتاز المصري </p>
                    	
                        <ul class="MediaList">
                        <li class="AudioList"></li>
                        <li class="VideoList"></li>
                        <li class="ImagesList"></li>
                        </ul>

                    
                    </div><!--MediaBlockCont-->
                    <img src="uploads/169.jpg" />
                    </a>
                    </div><!--MediaBlock-->           
                
            </div><!--MediaBlock-->
     	
        	</div><!--BlackMediaBlock-->
            
           
           <div class="widget">
             <div class="GoolgeWideAd pull-righ">
                <img src="images/366x280.jpg" />
                </div><!--GoolgeWideAd-->
                <div class="clearfix"></div>
               </div><!--widget-->
                                    
            </div><!--col-md-4-->

    		
            <div class="col-lg-8 col-md-8">
            		
               <? 
			   	
				$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;				
				
				$args=array(

					'cat'					 => $category_id ,
					'meta_query'             => array(
												'key' => 'was_add_to_feature', // this key will change!
												'compare' => '=',
												'value' => 'no'									
												),	
					'meta_key' 				 => 'was_add_to_feature',								
					'paged' 				 => $paged 
				 		);

					// The Query
					$the_query = new WP_Query( $args );
			   		global $post ;
			   ?>     
                    
              <? if( $the_query->have_posts()):
			  		while( $the_query->have_posts()) :
							
							$the_query->the_post();

				
				get_template_part('content' , 'categorypost'); ?>      
                
               <? endwhile; endif; ?> 

              <?php wp_reset_postdata(); ?>  
              
              <div class="Pagination">
              <?php custom_pagination($the_query->max_num_pages,"",$paged); ?> 
              </div>
  			</div><!--col-md-9-->
            
            
	</div><!--row-->
</div><!--container-->
 

<?php get_footer(); ?>
