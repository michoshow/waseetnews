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


$write = wp_get_post_terms($post->ID , 'writer');
		
?>

<div class="PostContainer">
	
  <div class="container"
  <div class="PostTitle row">
  	   
    </div><!--row--></div>
    
</div>

   


<div class="section Center MiddleGoogleAd">
<center>
<img src="<? bloginfo('template_directory') ?>/images/970x90.jpg" />
</center>
</div><!--MiddleGoogleAd-->


        <div class="container">
            <div class="row">
					<div class="col-md-12 col-lg-12">
                    
                           
                       <?
					   
					   $attachments =  get_multi_images_src('thumbnail','full',false,$post->ID);
					   $attahments_id = get_images_ids(true,$post->ID);
					   $videos = trim(get_field('videos'));
					  
					   $videos = explode("\n", strip_tags($videos) );	 
					   
					   $videocode = array();
					   
					   foreach($videos as $video){
						   
							$v = explode("/" , $video);
						
							array_push($videocode, $v[3] );   
							
							//echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$v[3].'" frameborder="0" allowfullscreen></iframe>';
					   }
					   
						
							    
					   if( count($attachments) > 0): ?>
							 
                       <div class="BlackMediaBlock AlbumsGallery"> 
                         <div class="BlackWideNewsTitle">
                        <h5 class="Bold White Right"><?=get_the_title($post->ID);?></h5>
                        
                        </div><!--BlackWideNewsTitle-->       			
                    	
                        <div class="GalleryShow">
                        
                        </div><!--GalleryShow-->
                        
                        
                        
                            <div class="ImgsGallery">
                           <? foreach($attachments as $attachment): ?>
                                    
                                	<div class="GalleryItem Fill"><a href="<?=$attachment[1][0]?>"  title=""><img src="<?=$attachment[0][0]?>" /></a></div><!--GalleryItem-->
                            		<? endforeach;	?>
                                    
                            </div><!--ImgsGallery-->


			</div><!--BlackMediaBlock-->
									
                    <? endif; ?>

                                    
                    </div><!--col-md-6           -->


            </div><!--row-->
        </div><!--container-->
        
        

<?php get_footer(); ?>
