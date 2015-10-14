<?php
/**
 * The main Pages template file
 *
 */

get_header();

global $post;

?>
<!-- Start Main Body -->


<? if(have_posts()){while (have_posts()){ the_post();
			}//endwhile
		}//endif

// Post Category

$thecat = get_the_category(); 

$writer = wp_get_post_terms($post->ID , 'writer');
	
?>



<div class="PostContainer">
	
  <div class="container">  <div class="PostTitle row">
  		<h1 class="Red Right Bold bshadow"><?=get_the_title($post->ID);?></h1>
    </div><!--row--></div>
    
</div>

   
<div class="container">    
       
   <div class="row PostMeta">
   	
        <div class="col-md-6 col-lg-6 Left">
        <h6 class="Black Normal">تابــع الكــاتـب :
        		<span class="Red FollowSocial">
        		<a href="#"><i class="fa fa-facebook"></i></a> &nbsp; 
                <a href="#"><i class="fa fa-twitter"></i></a> &nbsp;
                <a href="#"><i class="fa fa-google-plus"></i></a> &nbsp;
                <a href="#"><i class="fa fa-instagram"></i></a> &nbsp;                
                </span>
                </h6>
        </div>
    
       <div class="col-md-6 col-lg-6 Right">
        <h6 class="Black Normal">كتب : <span><a href="#" class="Red"><?=$writer[0]->name?></a></span> &nbsp; &nbsp; &nbsp;     | &nbsp; &nbsp; &nbsp; في :  <span class="Red"><?=get_the_date('j F Y',$post->ID)?></span></h6>
        </div>
       
        
   </div><!-- row -->
    
</div><!--container-->


<div class="section Center MiddleGoogleAd">
<center>
<img src="<? bloginfo('template_directory') ?>/images/970x90.jpg" />
</center>
</div><!--MiddleGoogleAd-->


        <div class="container">
            <div class="row">
					<div class="col-md-6 col-lg-6">
                    
        				<? 
						$thumbnail_id    = get_post_thumbnail_id($post->ID);
						$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
						?>
			   
                   
                            
		                    
                    	<div class="PostImg Fill">
                         <img src="<?=$feat_image = wp_get_attachment_url( $thumbnail_id ); ?>" />
                        </div><!--PostImg-->
                    	
                        <? 
						if ($thumbnail_image && isset($thumbnail_image[0])):
					 	 ?>
                        <p class="Black Center Normal">
                  		<?=$thumbnail_image[0]->post_excerpt;?>
                        </p>
						<? endif; ?>
                        
                       <?
					   
					   $attachments =  get_multi_images_src('thumbnail','full',false,$post->ID);
					   $attahments_id = get_images_ids(true,$post->ID);
						    
					   if( count($attachments) > 0): ?>
							 
                       <div class="BlackMediaBlock"> 
                         <div class="BlackWideNewsTitle">
                        <h5 class="Bold White Right">مالتي ميديا</h5>
                        </div><!--BlackWideNewsTitle-->       			
                    
                            <div class="ImgsGallery">
                           <? foreach($attachments as $attachment): ?>
                                    
                                	<div class="GalleryItem Fill"><a href="<?=$attachment[1][0]?>" class="Gallery" rel="Gallery" title=""><img src="<?=$attachment[0][0]?>" /></a></div><!--GalleryItem-->
                            		<? endforeach;	?>
                                    
                            </div><!--ImgsGallery-->


			</div><!--BlackMediaBlock-->
									
                    <? endif; ?>
                                    


<div class="PostSideBar">                        

<? get_sidebar('post');?>

</div><!--PostSideBar-->                        
                        
                    </div><!--col-md-6           -->


					<div class="col-md-6 col-lg-6 PostContent wshadow">
                    
                    <div class="row PostMeta" style="margin:15px 0;font-size:0.8em;padding:10px 10px 1px 10px;opacity:1">
                    	
                       		<div class="col-md-8 col-lg-8">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
							<div class="addthis_native_toolbox" style="padding:8px 0 0 0;"></div>
                            </div>                    
                    
							<div class="col-md-4 col-lg-4 Right">
                            <a href="<?=get_site_url() ?>/category/<?=$thecat[0]->category_nicename?>"><p class="Normal Black"><i class="fa fa-globe"></i>&nbsp; <?=$thecat[0]->name;?></p></a>
                            <? echo do_shortcode("[views]"); ?>	
                            </div>                    
					
                    
                    </div><!--PostMeta-->
        
       					
                         <div class="Parag"><?=  nl2br(html_entity_decode(get_the_content($post->ID)));?></div>
                         
                         
                         <!-- Start Comments Teplate -->	                                 
                         <div class="NewsBlock" style="margin:15px auto;">
                            <div class="NewsBlockTitle Center">
                                <h4 class="Center Red Bold" style="font-size:1em;"><span>تعليقات القراء</span></h4>
                            </div><!--NewsBlockTitle-->
                        <? comments_template(); ?>
                        </div><!--LatestNewsBlock-->
                        </div><!--NewsBlock-->
        				
                        
                    </div><!--PostContent-->
            </div><!--row-->
        </div><!--container-->
        

<?php get_footer(); ?>
