<?


add_shortcode('featured' , 'ws_featured_news' );

function ws_featured_news($atts , $content){
	
	$atts = shortcode_atts(
			array(
				'mobile' => 1 , 
				'tablet' => 2,
				'desktop' => 3,
				'category'=>1	
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
	'author'				 => 'michoshow' ,
	'posts_per_page'         => 3,
	);
// The Query
$the_query = new WP_Query( $args );
global $post;
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		
		$the_query->the_post();
		
		$title=get_the_title();
		
		$excerpt= get_the_excerpt();
		
		$link = get_permalink();
		
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
		echo "<img src=".$feat_image."' />";
		
		$html .= "
<div class='Featureitem Fill'>
<div class='Tags CategoryTag'>
<h6><span class='White'><i class='fa fa-globe'></i></span>
أخبار العالم
</h6>
</div><!--CategoryTag-->


<div class='Tags AutherTag'>
<h6><span class='White'><i class='fa fa-pencil'></i></span>
ميشيل ميلاد 
</h6>
</div><!--AutherTag-->
<div class='Tags DateTag'>
<h6><span class='White'><i class='fa fa-calendar'></i></span>
14 ديسمبر 2015
</h6>
</div><!--AutherTag-->
<div class='FeatuedItemDetails'>
<h3><a href='".$link."'  class='Bold Red Center bshadow'>".$title."</a></h3>
<p class='Center' style='margin-top:10px;'>".strip_tags($excerpt)."</p>
<ul class='MediaList'>
<li class='AudioList'></li>
<li class='VideoList'></li>
<li class='ImagesList'></li>
</ul>
</div><!--FeatuedItemDetails-->
<img src=".$feat_image."' />
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
?>