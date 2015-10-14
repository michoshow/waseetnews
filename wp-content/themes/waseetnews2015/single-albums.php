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
					   
					   // All Attachments Array
					   $allattachments_thumb = array();              
                       $allattachments=array();          	
                       
					   // Images Gallery
                       $attachments =  get_multi_images_src('thumbnail','full',false,$post->ID);
					   $attahments_id = get_images_ids(true,$post->ID);
						
						
					   // Loading All Image Attachment 						
					   foreach($attachments as $attachment){
						array_push($allattachments_thumb, $attachment[0][0]); 
						array_push($allattachments, $attachment[1][0]);
   					   }
                    
					
					   $videos = trim(get_field('videos'));
					   $videos = explode("\n", strip_tags($videos) );	 
					   trim($videos);
					   // Loading All video attachments	
					   foreach($videos as $video){
  						$v = explode("/" , $video);
						array_push($allattachments_thumb, $v[3] );   
						array_push($allattachments, $v[3] );   
	
						//echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$v[3].'" frameborder="0" allowfullscreen></iframe>';
					   }
					   
						
							    
					   if( count($allattachments_thumb) > 0): ?>
							 
                       <div class="BlackMediaBlock AlbumsGallery"> 
                         <div class="BlackWideNewsTitle">
                        <h5 class="Bold White Right"><?=get_the_title($post->ID);?></h5>
                        
                        </div><!--BlackWideNewsTitle-->       			
                    	
                        <div class="GalleryShow">
                        <? foreach($allattachments as $k=>$v):
						
						// Checing if attachments is image 

									if( strlen($v) > 20):
									// Attachment is Image
									?>
									
                                 	<div class="galleryimg Fill"><img class="VCenter" src="<?=$v?>" /></div><!--galleryimg-->
                                    
                                    <? else:
									  // Attachment is Video
									  
									?>
                                   <iframe style="width:100%;height:650px;"  src="https://www.youtube.com/embed/<?=$v?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    
                                    
                                    <? endif; ?>
                                    
                        

                        
                        
                        
                        
                        
                        
                        <? endforeach ?> 
                        
                        </div><!--GalleryShow-->
                        
                        
                        
                            <div class="ImgsGallery">
                           <? 		
						            
						   			foreach($allattachments_thumb as $k=>$v):
									
									// Checing if attachments is image 

									if( strlen($v) > 20):
									// Attachment is Image
									?>
									
                                    <div class="GalleryItem Fill GalleryThumb" data-order="<?=$k?>"><img src="<?=$v?>" /></div><!--GalleryItem-->                                    
                                    
                                    <? else:
									  // Attachment is Video
									  
									?>
                                    <div class="GalleryItem Fill GalleryThumb" data-order="<?=$k?>"><img src="http://img.youtube.com/vi/<?=$v?>/mqdefault.jpg" /></div><!--GalleryItem-->
                                    
                                    
                                    <? endif; ?>
                                	
                            		<? endforeach;	?>
                                    
                            </div><!--ImgsGallery-->


			</div><!--BlackMediaBlock-->
									
                    <? endif; ?>

                                    
                    </div><!--col-md-6           -->


            </div><!--row-->
        </div><!--container-->
        
        

<?php get_footer(); ?>
