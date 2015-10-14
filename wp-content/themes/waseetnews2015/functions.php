<?
add_theme_support( 'post-thumbnails' ); 


// Regsiter Menus
add_theme_support( 'menus' ); 

add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
					  //location 	  // Menu Name    // Menu Slug
  register_nav_menu( 'header_menu', __( 'Main Menu', 'main_menu' ) );
  register_nav_menu( 'footer_menu', __( 'Footer Menu', 'footer_menu' ) );  
}

add_filter('images_cpt','my_image_cpt');
    function my_image_cpt(){
        $cpts = array('page','post');
        return $cpts;
    }

// Add MetaBox To Post " Add to Feature News"
add_action('add_meta_boxes' , 'ws_add_To_Feature');
add_action('save_post' , 'ws_save_meta_box');

function ws_add_To_Feature(){
add_meta_box('was_add_to_feature' , 'Add To Feature News' , 'ws_add_to_feature_news' ,'post');	
}

function ws_add_to_feature_news($post){
			
	?>	
	
	<? $val = get_post_custom($post->ID);
	   $val = $val['was_add_to_feature'][0]	
	?>
    
    
    <input type="checkbox" name="was_add_to_feature" class="selectit" id="was_add_to_feature" <? if($val == "yes"): ?> checked="checked" <? endif ?> />	
    <label for="was_add_to_feature">Add To Feature News Slider</label>

<?
}

function ws_save_meta_box($post_id){
		if(isset($_POST['was_add_to_feature'])){
		update_post_meta($post_id , 'was_add_to_feature','yes');	
		}else{
		update_post_meta($post_id , 'was_add_to_feature','no');
		}
}



// custom Text cut
function cut($string, $max_length)
{
//here i delete all html tages except <p> and <br> then i get 100 character only from the string
	$string =strip_tags($string,'<p><br>');
	if (strlen($string) > $max_length)
	{
		$string = str_replace("<br>"," ",$string);
		$string = substr($string, 0, $max_length);
		$pos = strrpos($string, " ");
		if($pos === false)
		{
				return substr($string, 0, $max_length)."...";
		}
			return substr($string, 0, $pos)."...";
	}
	else
	{
		return $string;
	}
}



// Cuastome Loop Pagination 
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
   
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => false,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => '<i class="fa fa-chevron-left"></i>',
    'next_text'       => '<i class="fa fa-chevron-right"></i>',
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
     // echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}


/**
 * Popular posts tracking
 *
 * Tracks the number of logged out user views for a post in a custom field
 */
function base_track_popular_posts() {

	// Only run the process for single posts, pages and post types when the user is logged out
	if ( is_singular() && !is_user_logged_in() ) {
		
		global $post;
		$custom_field = '_base_popular_posts_count';
		
		// Set/check session
		//if ( !session_id() ) 
		//	session_start();
		
		// Only track a one view per post for a single visitor session to avoid duplications
		if ( !isset( $_SESSION["popular-posts-count-{$post->ID}"] ) ) {
			
			// Update view count 
			$view_count = get_post_meta( $post->ID, $custom_field, true );
			$stored_count = ( isset($view_count) && !empty($view_count) ) ? ( intval($view_count) + 1 ) : 1;
			$update_meta = update_post_meta( $post->ID, $custom_field, $stored_count );
			
			// Check for errors
			if ( is_wp_error($update_meta) )
				error_log( $update_meta->get_error_message(), 0 );
			
			// Store session in "viewed" state
			$_SESSION["popular-posts-count-{$post->ID}"] = 1;
		}

		// Show view the count for testing purposes (add "?show_count=1" onto the URL)
		if ( isset($_GET['show_count']) && intval($_GET['show_count']) == 1 ) {
			echo '<p style="color:red; text-align:center; margin:1em 0;">';
			echo get_post_meta( $post->ID, $custom_field, true );
			echo ' views of this post</p>';
		}
	}
}
add_action('wp_head', 'base_track_popular_posts');





/// Adding Multi Image Meta Box to Custome Posts
add_filter('images_cpt','cutome_image_cpt');
    function cutome_image_cpt(){
        $cpts = array('post','albums');
        return $cpts;
    }

add_filter('list_images','custome_list_images');
    function custome_list_images(){
        //I only need two pictures
        $picts = array(
            'image1' => '_image1',
            'image2' => '_image2',
            'image3' => '_image3',
            'image4' => '_image4',
            'image5' => '_image5',
            'image6' => '_image6',
            'image7' => '_image7',
            'image8' => '_image8',
            'image9' => '_image9',
            'image10' => '_image10',
            'image11' => '_image11',
            'image12' => '_image12',
            'image13' => '_image13',
            'image14' => '_image14',
            'image15' => '_image15',
            'image16' => '_image16',
            'image17' => '_image17',
            'image18' => '_image18',
            'image19' => '_image19',
            'image20' => '_image20',

        );
        return $picts;
    }
		
?>