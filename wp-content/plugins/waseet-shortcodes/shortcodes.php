<?
/*
 * Plugin Name: Waseet Shortcodes
 * Description: Shortcodes for creating  Sliders and Custom Loops.
 * Version: 0.1
 * Author: Michel Melad
 * Author URI: http://www.michelmelad.com/
 * Plugin URI: http://www.michelmelad.com/wp-plugins
 */

/*
******************************************************************************************************
// Featured Posts Shortcode 

			*****[feature mobile="1" tablet="2" desktop="3" num="5" cat="0" ]*****
******************************************************************************************************
*/
add_shortcode('featured' , 'ws_featured_news' );
function ws_featured_news($atts , $content){
	$atts = shortcode_atts(
			array(
				'mobile' => 1 , 
				'tablet' => 2,
				'desktop' => 3,
				'num' => 5 , 
				'cat' => 0
				),
			$atts
	);
	extract($atts);
	// Before Loop	
	$html = "<div class='FeaturedNews owl-carousel owl-theme'
		data-mobile='$mobile'
		data-tablet='$tablet'
		data-desktop='$desktop'>";	
	
	$args=array(
	'meta_query'             => array(
								'key' => 'was_add_to_feature', // this key will change!
					            'compare' => '=',
            					'value' => 'yes',											
								),	
	'meta_key' 				 => 'was_add_to_feature',								
	'posts_per_page'         => $num,
	'cat'					 => $cat
	);
				if($cat != 0 ){
				$args['cat'] = $cat ;	
				}
// The Query
$the_query = new WP_Query( $args );
global $post;
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$cat = get_the_category();
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
		$writer = wp_get_post_terms($post->ID , 'writer');
		
	
		$html .= "
<div class='Featureitem Fill'>
<div class='Tags CategoryTag'>
<a href='category/".$cat[0]->category_nicename."' class='White'><h6><span><i class='fa fa-globe'></i></span>".$cat[0]->cat_name."</h6></a>
</div><!--CategoryTag-->


<div class='Tags AutherTag'>
<h6><span class='White'><i class='fa fa-pencil'></i></span>".$writer[0]->name."</h6>
</div><!--AutherTag-->
<div class='Tags DateTag'>
<h6><span class='White'><i class='fa fa-calendar'></i></span>".get_the_date('j F Y' , $post->ID )."</h6>
</div><!--AutherTag-->
<div class='FeatuedItemDetails'>
<a href='".get_permalink($post->ID)."'  class='Bold Red Center bshadow' style='display:block;'>
<h5 class='Right featuredTitle'>".cut(get_the_title($post->ID),120)."</h5>
<p class='Right RTL White' style='margin-top:10px;'>".strip_tags( cut( get_the_content($post->ID) , 250 ))."</p>
</a>
</div><!--FeatuedItemDetails-->
<img src='".$feat_image."' />
</div><!--Featureitem-->
";
} // EndWhite
} // EndIF
/* Restore original Post Data */
wp_reset_postdata();
// After News Loop
$html .="</div><!--FeaturedNews-->";	
return $html;
}




/*
******************************************************************************************************
// Verticl News Block
			
			*****[vnews cat="12" num="3"]*****
			
******************************************************************************************************
*/

add_shortcode('vnews' , 'ws_v_news_block' );


function ws_v_news_block($atts){
	
	$atts = shortcode_atts(
			array(
				'cat' 	=> 0 , 
				'num'	=> 5
				),
			$atts
	);
	extract($atts);
	
	
	global $post;
	// Category Title 
	$cat_name = get_cat_name($cat);
	$category_link = get_category_link($cat);
	
	
	$args=array(
	'posts_per_page'         => 1,
	'cat'					 => $cat
	);
	
	// The Query
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$writer = wp_get_post_terms($post->ID , 'writer');
		}
	}


	// Befor The Loop 
	$html = '
	<div class="NewsBlock">
                <div class="NewsBlockTitle Center">
                
                
                <h4 class="Center Red Bold"><span>'.$cat_name.'</span></h4>
                </div><!--NewsBlockTitle-->


                <div class="NewsBlockCont">
			
								<div class="NewsBlockMain">
										<div class="NewsBlockMainImage Fill">
										
											<div class="SmallTags SmallAutherTag">
											<p class="pull-right"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'" class="White">'.$writer[0]->name.'</p>
											<span class="White pull-right"><i class="fa fa-pencil"></i></span>
											</a>
											<div class="clearfix"></div>
											</div><!--CategoryTag-->
											
											
											<div class="SmallTags SmallDateTag">
											<p class="pull-right">'.get_the_time("j F Y").'</p>
											<span class="White pull-right"><i class="fa fa-calendar"></i></span>
											<div class="clearfix"></div>
											</div><!--CategoryTag-->
											
										<img src="'.$feat_image.'" />
										</div><!--NewsBlockMainImage-->
										
										<a href="'.get_the_permalink().'"><h5 class="Red Bold Right" RTL">'.cut(get_the_title(),100).'</h5></a>
								</div><!--NewBlockMain-->
				' ;
	// Reset First Loop			
	wp_reset_postdata();			
        
	$args=array(
	'posts_per_page'         => $num - 1 ,
	'cat'					 => $cat ,
	'offset'				 => 1	
	);
	
	global $post;
	// The Query
	$the_query = new WP_Query( $args );
	

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$writer = wp_get_post_terms($post->ID , 'writer');
	
	   // The loop         
       $html .= '   	    <div class="VerBlock">
                        	<a href="'.get_the_permalink().'" class="VerBlock Right" >

                            <div class="VerBlockimage Fill pull-right">
                            <img src="'.$feat_image.'" />
                            </div><!--VerBlockimage-->

							<div style="direction:rlt">
                        	<h6 class="Bold Black Right RTL">'.cut(get_the_title(),120).'</h6>
                            <p class="Red Right" style="direction:rtl"> كتب : '.$writer[0]->name.' &nbsp; | &nbsp; في : '.get_the_time("j F Y").'</p>
                            </div>
                            <div class="clearfix"></div>

                            </a>
                        </div><!--VerBlock-->
                
				';
				
		}
	}
 			
	// Reset Second Loop			
	wp_reset_postdata();			
				// out the loop        
				$html .= '
				 
                </div><!--LatestNewsBlock-->
                <div class="ReadMoreBlock">
                
                <!--<div class="NextArrow pull-right"></div>-->
                
                <a href="'.esc_url( $category_link ).'" class="Bold Center White">إقــرأ المـزيـد</a>
                
                <!--<div class="PrevArrow pull-left"></div>-->
                <div class="clearfix"></div>
                </div><!--ReadMoreBlock-->
                </div><!--NewsBlock-->
				';
	
	return $html;
}



/*
******************************************************************************************************
// Latest News And Most Read
			
			*****[latestnews  mobile="1" tablet="2" desktop="4" num="7"  latest="true" ]أحدث الأخبار[/latestnews]*****
			
******************************************************************************************************
*/


add_shortcode('latestnews' , 'ws_latest_news_block' );


function ws_latest_news_block($atts , $content){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 5 , 
				'mobile'	=> 1 ,
				'tablet'	=> 3,
				'desktop'	=> 4 , 
				'latest' => false
				),
			$atts
	);
	
	extract($atts);

	$content = (!isset($content)) ? "الأكثر قراءة" : $content ;

	// Before the Loop
	$html = '
		<div class="NewsBlock">
		<div class="NewsBlockTitle Center">
		<h4 class="Center Red Bold"><span>'.$content.'</span></h4>
	    </div><!--NewsBlockTitle-->
			<div class="clearfix"></div>
			
			<div class="NewsBlockCont LatestNewsBlock" data-mobile ="'.$mobile.'" data-tablet = "'.$tablet.'" data-desktop= "'.$desktop.'" >
			';

	if($latest){
	
			// Args For Latest News	
			$args=array(
			'posts_per_page'         => $num,
			);
			
	}else{
			
			// Args For most views	
			$args=array(
					'meta_key' 				 => '_base_popular_posts_count',
					'orderby'				 => 'meta_value_num' ,
					'posts_per_page'         => $num
			);		
	}
	
	global $post;
	// The Query
	$the_query = new WP_Query( $args );
	

	if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$writer = wp_get_post_terms($post->ID , 'writer');
			$cat = get_the_category();
			// The loop
			$html .= '
			<div class="Block Right">
			
			<div class="BlockImgCont Fill">
			
			<div class="SmallTags SmallCategoryTag">
			<p class="pull-right">'.$cat[0]->cat_name.'</p>
			<span class="White pull-right"><i class="fa fa-globe"></i></span>
			<div class="clearfix"></div>
			</div><!--CategoryTag-->
			<img src="'.$feat_image.'" />
			</div><!--BlockImgCont-->
			<a href="'.get_the_permalink().'" class="Black Right Bold RTL">'.cut(get_the_title() , 110).'</a>
			
			<p class="Red Normal SmallParag" style="padding-top:10px"> كتب : '.$writer[0]->name.'&nbsp; &nbsp;</p>
			</div><!--Block-->
			 ';

		}
		}

		// Reset Second Loop			
		wp_reset_postdata();	
					 
			//After the loop 
			 $html .='
					</div><!--LatestNewsBlock-->
					</div><!--NewsBlock-->
					';
	
		
	return $html;
}


/*
******************************************************************************************************
// Wide News Block
			
			*****[widenews  mobile="1" tablet="2" desktop="4"  cat="2,12" ]أخبار مصر و العالم [/widenews]*****
			
*****************************************************************************************************
*/
add_shortcode('widenews' , 'ws_wide_news_block' );


function ws_wide_news_block($atts , $content){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 5 , 
				'mobile'	=> 1 ,
				'tablet'	=> 3,
				'desktop'	=> 4 , 
				'cat'		=> '12,2'
				),
			$atts
	);
	$content = (!isset($content)) ? "أحدث الأخبار" : $content ;
	extract($atts);
	
	// Before the Loop
	$html = '
		<div class="NewsBlock">
		<div class="NewsBlockTitle Center">
		<h4 class="Center Red Bold"><span>'.$content.'</span></h4>
	    </div><!--NewsBlockTitle-->
			<div class="clearfix"></div>
			
			<div class="NewsBlockCont EgyptAndTheWorldBlock WideNewsBlock" data-mobile ="'.$mobile.'" data-tablet = "'.$tablet.'" data-desktop= "'.$desktop.'">
			';


	$args=array(
	'posts_per_page'         => $num,
	'cat'					 => $cat 
	);
	global $post;
	// The Query
	$the_query = new WP_Query( $args );
	

	if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$writer = wp_get_post_terms($post->ID , 'writer');
			// The loop
			$html .= '
					<div class="Block Right">
					<a href="'.get_the_permalink().'" class="Black Right Bold RTL"><h6 class="Bold">'.cut(get_the_title(),100).'</h6></a>
					
					<div class="BlockImgCont Fill">
					
					
					<div class="SmallTags SmallAutherTag">
					<p class="pull-right">'.$writer[0]->name.'</p>
					<span class="White pull-right"><i class="fa fa-pencil"></i></span>
					<div class="clearfix"></div>
					</div><!--CategoryTag-->
					
					
					<div class="SmallTags SmallDateTag">
					<p class="pull-right">'.get_the_time("j F Y").'</p>
					<span class="White pull-right"><i class="fa fa-calendar"></i></span>
					<div class="clearfix"></div>
					</div><!--CategoryTag-->
					
					
					
					<img src="'.$feat_image.'" />
					</div><!--BlockImgCont-->
					
					</div><!--Block-->
					';

		}
		}

		// Reset Second Loop			
		wp_reset_postdata();	
					 
			//After the loop 
			 $html .='
					</div><!--LatestNewsBlock-->
					</div><!--NewsBlock-->
					';
	
	
	
	return $html;
}


/*
******************************************************************************************************
// Black News Block
			
		*****[vblack  cat="2,12" ]أخبار مصر و العالم [/widenews]*****
			
*****************************************************************************************************
*/
add_shortcode('vblack' , 'ws_vertical_black_block' );


function ws_vertical_black_block($atts){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 5 , 
				'cat'		=> 4
				),
			$atts
	);

	extract($atts);
	
	global $post;
	
	$args=array(
	'posts_per_page'         => $num,
	'cat'					 => $cat 
	);
	
	// The Query
	$the_query = new WP_Query( $args );
	

	$titles =  array();
	$authors= array();
	$dates = array();
	$excerpts = array();
	$permalinks = array();
	$thumbs = array();
	
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
		$the_query->the_post();

		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
		$writer = wp_get_post_terms($post->ID , 'writer');
		
		array_push($titles , get_the_title());
		array_push($authors, $writer[0]->name);
		array_push($dates , get_the_time("j F Y"));	
		array_push($excerpts , cut(get_the_content(),300) );				
		array_push($permalinks , get_the_permalink() );	
		array_push($thumbs , $feat_image );				
		
		}
	}
	
		// Category Title 
	$cat_name = get_cat_name($cat);
	$category_link = get_category_link($cat);
	
	// Reset Second Loop			
	wp_reset_postdata();	
	
	
		$html = '
		<div class="BlackWideNewsBlock SportsNewBlock">
                
                <div class="BlackWideNewsTitle">
                <h4 class="Bold White Right">'.$cat_name.'</h4>
                </div>	<!--BlackWideNewsTitle-->
                
                    <div class="row">
                    	
                        <div class="col-md-4 col-lg-4">
                        
                        <div class="BlackWidesubNews">
                        	
                            <div class="BlackWideSubMain">
                            	<div class="BlackWideSubMainImage Fill">
                                <a href="'.$permalinks[1].'"><img src="'.$thumbs[1].'" /></a>
                                </div><!--BlackWideSubMainImage-->
                                
                                <p><a class="Bold Right White" href="'.$permalinks[1].'">'.$titles[1].'</a></p>
                                <p class="Red SmallParag Right">كتب : '.$authors[1].' &nbsp; &nbsp; في '.$dates[1].'</p>
                                
                            </div><!--BlackWideSubMain-->
                        
                        ';
                        for($i = 2 ; $i <= $num - 1 ; $i++):	
                		$html .='
                        <div class="VerBlock">
                        	<a href="'.$permalinks[$i].'" class="VerBlock Right" >

                            <div class="VerBlockimage Fill pull-right">
                            <img src="'.$thumbs[$i].'" />
                            </div><!--VerBlockimage-->

							<div>
                        	<p class="Bold White Right">'.cut($titles[$i],80).'</p>
                            <p class="Red Right SmallParag"> كتب : '.$authors[$i].'</p>

                            </div>
                            <div class="clearfix"></div>

                            </a>
                        </div><!--VerBlock-->
                
						';
						
						endfor;
						
                        $html.='	
                        </div><!--BlackWidesubNews-->
                          
                        
                        </div><!--col-md-4-->
                        
                        
                        <div class="col-md-8 col-lg-8" style="padding-left:0;">
                        
                          <div class="BlackWideMain Fill" style="direction:ltr">
                            
                                        <div class="Tags AutherTag" style="left:40%">
                                        <h6><span class="White RTL"><i class="fa fa-pencil"></i></span>'.$authors[0].'</h6>
                                        </div><!--AutherTag-->
                                        
                                        
                                        <div class="Tags DateTag">
                                        <h6><span class="White"><i class="fa fa-calendar"></i></span>'.$dates[0].'</h6>
                                        </div><!--AutherTag-->
                                        
                                        
										
                                        <div class="FeatuedItemDetails">
                                        
                                        <h5><a href="'.$permalinks[0].'"  class="Bold Red Center bshadow RTL">'.$titles[0].'</a></h5>
                                        <p class="Center RTL">'.$excerpts[0].'</p>
                                        
                                     
                                        </div><!--FeatuedItemDetails-->
                            
                            <img src="'.$thumbs[0].'" />
                            </div><!--BlackWideMain-->
                            
                            
                        </div><!--col-md-8-->
                        
                    </div><!--row-->
                	
                </div><!--SportsNewBlock-->
	';

	return $html;
}





/*
******************************************************************************************************
// Black News Block
			
		*****[wideblack  cat="2,12" ]أخبار مصر و العالم [/widenews]*****
			
*****************************************************************************************************
*/
add_shortcode('wideblack' , 'ws_wide_black_block' );


function ws_wide_black_block($atts){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 10 , 
				'cat'		=> 4
				),
			$atts
	);

	extract($atts);
	
	global $post;
	
	$args=array(
	'posts_per_page'         => $num,
	'cat'					 => $cat 
	);
	
	// The Query
	$the_query = new WP_Query( $args );
	

	$titles =  array();
	$authors= array();
	$dates = array();
	$excerpts = array();
	$permalinks = array();
	$thumbs = array();
	
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
		$the_query->the_post();

		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$writer = wp_get_post_terms($post->ID , 'writer');
		
		array_push($authors, $writer[0]->name);
		array_push($titles , get_the_title());
		array_push($dates , get_the_time("j F Y"));	
		array_push($excerpts , cut(get_the_content(),300) );				
		array_push($permalinks , get_the_permalink() );	
		array_push($thumbs , $feat_image );				
		
		}
	}
	
		// Category Title 
	$cat_name = get_cat_name($cat);
	$category_link = get_category_link($cat);
	
	// Reset Second Loop			
	wp_reset_postdata();	
	
	
	
    
	
	
		$html = '
				<div class="WideBlackNewsBlock">
				
                <div class="BlackWideNewsTitle">
                <h4 class="Bold White Right">لايف استايل</h4>
                </div>	<!--BlackWideNewsTitle-->
              
              <div class="row">

				<div class="col-lg-4 col-md-4">
                                    
                        ';
                        
                        for($i = 6 ; $i <=  9 ; $i++ ):	
                		$html .='
                          <div class="VerBlock">
                        	<a href="'.$permalinks[$i].'" class="VerBlock Right" >

                            <div class="VerBlockimage Fill pull-right">
                            <img src="'.$thumbs[$i].'" />
                            </div><!--VerBlockimage-->

							<div>
                        	<h6 class="Bold White Right">'.cut($titles[$i],90).'</h6>
                            <p class="Red Right"> كتب : '.$authors[$i].'</p>
                            </div>
                            <div class="clearfix"></div>

                            </a>
                        </div><!--VerBlock-->
						';
						endfor;
						
                       $html .='</div><!--col-md-4-->                 
              		<div class="col-lg-4 col-md-4">
                                    '; 
                        
                        for($i = 2 ; $i<= 5 ; $i++ ):	
                		$html .='
                         <div class="VerBlock">
                        	<a href="'.$permalinks[$i].'" class="VerBlock Right" >

                            <div class="VerBlockimage Fill pull-right">
                            <img src="'.$thumbs[$i].'" />
                            </div><!--VerBlockimage-->

							<div>
                        	<h6 class="Bold White Right">'.cut($titles[$i],90).'</h6>
                            <p class="Red Right"> كتب : '.$authors[$i].'</p>
                            </div>
                            <div class="clearfix"></div>

                            </a>
                        </div><!--VerBlock-->
						';
						endfor;
						
                        
                        
                        $html.='	
                         </div><!--col-md-4-->
                    

              		<div class="col-lg-4 col-md-4">
                    	
                        <div class="NewsBlockMain" style="border:none;">
                
                		<div class="NewsBlockMainImage Fill">
                        
	                        <div class="SmallTags SmallAutherTag">
                            <p class="pull-right">'.$authors[0].'</p>
                            <span class="White pull-right"><i class="fa fa-pencil"></i></span>
                            <div class="clearfix"></div>
                            </div><!--CategoryTag-->
                            
                            
                            <div class="SmallTags SmallDateTag">
                            <p class="pull-right">2015-07-02</p>
                            <span class="White pull-right"><i class="fa fa-calendar"></i></span>
                            <div class="clearfix"></div>
                            </div><!--CategoryTag-->
                            
                        <img src="'.$thumbs[0].'" />
                        </div><!--NewsBlockMainImage-->
                		
                        <a href="'.$permalinks[0].'"><h5 class="Red Bold Right">'.$titles[0].'</h5></a>
                		</div><!--NewBlockMain-->
						
						
						
						
						
						 <div class="NewsBlockMain" style="border:none;">
                
                		<div class="NewsBlockMainImage Fill">
                        
	                        <div class="SmallTags SmallAutherTag">
                            <p class="pull-right">'.$authors[1].'</p>
                            <span class="White pull-right"><i class="fa fa-pencil"></i></span>
                            <div class="clearfix"></div>
                            </div><!--CategoryTag-->
                            
                            
                            <div class="SmallTags SmallDateTag">
                            <p class="pull-right">2015-07-02</p>
                            <span class="White pull-right"><i class="fa fa-calendar"></i></span>
                            <div class="clearfix"></div>
                            </div><!--CategoryTag-->
                            
                        <img src="'.$thumbs[1].'" />
                        </div><!--NewsBlockMainImage-->
                		
                        <a href="'.$permalinks[1].'"><h5 class="Red Bold Right">'.$titles[1].'</h5></a>
                		</div><!--NewBlockMain-->
                
                        
                    </div><!--/*col-lg-4 */-->
                    
                    
              		
              </div><!--row-->
                	
	</div><!--WideBlackNewsBlock-->
	';

	return $html;
}

/*
******************************************************************************************************
// Articles Block
			
		*****[atricles  num = "3"  mobile="1" tablet="2" desktop="4"]*****
			
*****************************************************************************************************
*/
add_shortcode('atricles' , 'ws_atricles_block' );


function ws_atricles_block($atts){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 5 ,
				'mobile'	=> 1,
				'tablet'	=> 2 ,
				'desktop'	=> 2
				),
			$atts
	);

	extract($atts);
	
	global $post;
	
	$args=array(
	'posts_per_page'         => $num,
	'post_type'					 => 'articles' 
	);
	
	// Befor the Loop	
	$html = '<div class="ArticlesBlock" data-mobile ="'.$mobile.'" data-tablet = "'.$tablet.'" data-desktop= "'.$desktop.'">';

	// The Query
	$the_query = new WP_Query( $args );
	
	// The Loop
	
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
		$the_query->the_post();
		
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
		$write = wp_get_post_terms($post->ID , 'writer');
		$series = wp_get_post_terms($post->ID , 'series');
			


		$html .= '<div class="Article Fill">


				
				<p class="ArticleSeries"><a href="'.get_term_link($series[0]->name,'series').'">'.$series[0]->name.'</a></p>
				
			
				
                <a href="'.get_the_permalink().'">
				<img src="'.$feat_image.'" />

               
			   	<div class="ArticleDetails">
				<h4 class="White Bold Right">'.get_the_title().'</h4>
				<h6 class="Red Right Normal">كتب : '.$write[0]->name.'</h6>
				</div>
				</a>					
			    </div><!--Article-->

	';


			
		}
	}



	// Reset Second Loop			
	wp_reset_postdata();	
	
    // After The Loop
	$html .='</div><!--ArticlesBlock-->';
	
	return $html;
}





/*
******************************************************************************************************
// Article Series Block
			
		*****[atricleseries  num = "1" series = "25"]*****
			
*****************************************************************************************************
*/
add_shortcode('atricleseries' , 'ws_atricleseries_block' );


function ws_atricleseries_block($atts){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 25 ,
				'series'	=> 1
				),
			$atts
	);

	extract($atts);
	
	global $post;
	
	$args=array(
	'posts_per_page'         => $num,
	'post_type'				 => 'articles' ,
	'tax_query' => array(
        array(
            'taxonomy' => 'series',
            'terms' => $series,
        	'field' => 'term_id'
        )
    )
	
	);
	
	// Befor the Loop	
	$html = '<div class="ArticlesSeries">';

	// The Query
	$the_query = new WP_Query( $args );
	
	// The Loop
	
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
		$the_query->the_post();
		
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
		$write = wp_get_post_terms($post->ID , 'writer');
		$series = wp_get_post_terms($post->ID , 'series');
			


		$html .= '<div class="Article Fill">


				
				<p class="ArticleSeries"><a href="'.get_term_link($series[0]->name,'series').'">'.$series[0]->name.'</a></p>
				
			
				
                <a href="'.get_the_permalink().'">
				<img src="'.$feat_image.'" />

               
			   	<div class="ArticleDetails">
				<h4 class="White Bold Right">'.get_the_title().'</h4>
				<h6 class="Red Right Normal">كتب : '.$write[0]->name.'</h6>
				</div>
				</a>					
			    </div><!--Article-->

	';


			
		}
	}



	// Reset Second Loop			
	wp_reset_postdata();	
	
    // After The Loop
	$html .='</div><!--ArticlesSeries-->';
	
	return $html;
}


/*
******************************************************************************************************
// Horisontal News Block
			
			*****[hnews  mobile="1" tablet="2" desktop="4"  cat="2,12" ]أخبار مصر و العالم [/hnews]*****
			
*****************************************************************************************************
*/
add_shortcode('hnews' , 'ws_horizontal_news_block' );


function ws_horizontal_news_block($atts , $content){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 5 , 
				'mobile'	=> 1 ,
				'tablet'	=> 3,
				'desktop'	=> 4 , 
				'cat'		=> '12,2'
				),
			$atts
	);
	$content = (!isset($content)) ? "أحدث الأخبار" : $content ;
	extract($atts);
	
	// Before the Loop
	$html = '
	
		<div class="NewsBlock">
		<div class="NewsBlockTitle Center">
		<h4 class="Center Red Bold"><span>'.$content.'</span></h4>
	    </div><!--NewsBlockTitle-->
			<div class="clearfix"></div>
			
			<div class="NewsBlockCont HorizontalNewsBlock" data-mobile ="'.$mobile.'" data-tablet = "'.$tablet.'" data-desktop= "'.$desktop.'">
			';


	$args=array(
	'posts_per_page'         => $num,
	'cat'					 => $cat 
	);
	global $post;
	// The Query
	$the_query = new WP_Query( $args );
	

	if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			$writer = wp_get_post_terms($post->ID , 'writer');
		
			// The loop
			$html .= '
					<div class="Block Right" style="height:auto;padding-bottom:7px">
					<a href="'.get_the_permalink().'" class="Black Right Bold RTL"><h6 class="Bold">'.cut(get_the_title(),100).'</h6></a>
					
					<div class="BlockImgCont Fill">
					
					
					<div class="SmallTags SmallAutherTag">
					<p class="pull-right">'.$writer[0]->name.'</p>
					<span class="White pull-right"><i class="fa fa-pencil"></i></span>
					<div class="clearfix"></div>
					</div><!--CategoryTag-->
					
					
					<div class="SmallTags SmallDateTag">
					<p class="pull-right">'.get_the_time("j F Y").'</p>
					<span class="White pull-right"><i class="fa fa-calendar"></i></span>
					<div class="clearfix"></div>
					</div><!--CategoryTag-->
					
					
					
					<img src="'.$feat_image.'" />
					</div><!--BlockImgCont-->
					
					</div><!--Block-->
					';

		}
		}

		// Reset Second Loop			
		wp_reset_postdata();	
					 
			//After the loop 
			 $html .='
					</div><!--LatestNewsBlock-->
					</div><!--NewsBlock-->
					<div class="ReadMoreBlock">
					<a href="post.php" class="Bold Center White">إقــرأ المـزيـد</a>
					<div class="clearfix"></div>
					</div><!--ReadMoreBlock-->
					';

	
	
	
	return $html;
}




/*
******************************************************************************************************
// Media Block
			
			*****[multimedia  mobile="1" tablet="2" desktop="4" ]مالتي ميدي[/multimedia] *****
			
*****************************************************************************************************
*/
add_shortcode('multimedia' , 'ws_multimedia_block' );


function ws_multimedia_block($atts , $content){
	
	$atts = shortcode_atts(
			array(
				'num'		=> 5 , 
				'mobile'	=> 1 ,
				'tablet'	=> 3,
				'desktop'	=> 4 
				),
			$atts
	);
	$content = (!isset($content)) ? "مالتي ميديا" : $content ;
	extract($atts);
	
	// Before the Loop
	
	$html = '
	
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
	';
	
	// Reset Second Loop			
		wp_reset_postdata();	
	
	
	
	
	return $html;
}




?>