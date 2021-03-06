/*global jQuery:false, alert */
(function($) { 
    "use strict";
jQuery(document).ready(function($) {
	
	$('#sdf-promo-carousel').hide();
	$('#sdf_dashboard_widget .inside').hide();
	var sds_promo_blog_post = $('#sds_promo_blog_post').html();
	var banners_remote = ({
"banners": [
{"banner_img":"SEO-Ultimate-Dashboard-Bannner-1.jpg", "banner_link":"https://seoultimateplus.com/?ref=su-sb1"},
{"banner_img":"SEO-Ultimate-Dashboard-Bannner-2.jpg", "banner_link":"https://seoultimateplus.com/?ref=su-sb2"},
{"banner_img":"SEO-Ultimate-Dashboard-Bannner-3.jpg", "banner_link":"https://seoultimateplus.com/?ref=su-sb3"},
{"banner_img":"SEO-Ultimate-Dashboard-Bannner-4.jpg", "banner_link":"https://seoultimateplus.com/?ref=su-sb4"},
{"banner_img":"SEO-Ultimate-Dashboard-Bannner-5.jpg", "banner_link":"https://seoultimateplus.com/?ref=su-sb5"},
{"banner_img":"SEO-Ultimate-Dashboard-Bannner-6.jpg", "banner_link":"https://seoultimateplus.com/?ref=su-sb6"},
{"banner_img":"InternalLinkBanner.jpg", "banner_link":"https://seodesignframework.leadpages.net/internal-links/"},
{"banner_img":"MetaWritingBanner.jpg", "banner_link":"https://seodesignframework.leadpages.net/meta-titles-descriptions/"}
],
"slides": [
{"slide_cap":"<h3>Download Jeffrey’s Brain</h3><p>Get Equipped for Success - Tips from Our Founder. Download: 20 SEO Tips, SEO for Large Websites and the Organic SEO EBook today.</p>", "slide_link":"http://www.seodesignframework.com/ebooks/"},
{"slide_cap":"<h3>Got Design?</h3><p>Unleash Your Best Design Concepts with Drag-n-Drop Controls that Give You the Power to Implement Complex Designs Quickly and Easily</p>", "slide_link":"http://www.seodesignframework.com/sdf-drag-and-drop-page-builder/"},
{"slide_cap":"<h3>Silos Made Easy</h3><p>Deploy Perfect Website Silo Architecture Quickly and Easily with the SEO Design Framework.</p>", "slide_link":"http://www.seodesignframework.com/website-silo-architecture/"},
{"slide_cap":"<h3>What, No Control?</h3><p>Become Master of your Blog with Page-Level Controls that Liberate Designs and Crush Limitations of other Themes and Frameworks.</p>", "slide_link":"http://www.seodesignframework.com/page-level-controls/"}
],
"dashboard_widget": [
{"title":"Learn How to Use SEO Ultimate", "content":"<p>Get access to <a rel=\"nofollow\" target=\"_blank\" title=\"SEO Ultimate video training\" href=\"https://seodesignframework.leadpages.net/seo-ultimate-video-training/\">detailed video training</a> covering each module.</p><a rel=\"nofollow\" target=\"_blank\" title=\"SEO Ultimate video training\" href=\"https://seodesignframework.leadpages.net/seo-ultimate-video-training/\"><img src=\"" + suModulesSdfAdsSdfAdsL10n.sdf_banners_url + "SEO-VideoTraining-Banner-v3.jpg\" alt=\"SEO Ultimate video training\" /></a>"}
]
})

		
	var promo_carousel = $('#sdf-promo-carousel');
	if (promo_carousel.length > 0) {
		var sdf_carousel = '';
		var shuffled_banners = shuffleArray(banners_remote.banners);
		var shuffled_slides = shuffleArray(banners_remote.slides);
		// check if it's cloud hosted banner
		var banner_img = shuffled_banners[0].banner_img
		if(banner_img.indexOf('https://') == -1) banner_img = suModulesSdfAdsSdfAdsL10n.sdf_banners_url + banner_img;
		sdf_carousel = sdf_carousel + "<a href=\"" + shuffled_banners[0].banner_link + "\" rel=\"nofollow\" target=\"_blank\"><img src=\"" + banner_img + "\" alt=\"Slide "+ i +"\"></a>";
		sdf_carousel = sdf_carousel + "<div id=\"sdfCarousel\" class=\"carousel slide\"><ol class=\"carousel-indicators\">";
				
		var active_indicator = '';
		for ( var i = 0; i < shuffled_slides.length; i++ ) {
			if (i == 0) active_indicator = ' class=\"active\"';
			else active_indicator = '';
			sdf_carousel = sdf_carousel + "<li data-target=\"#sdfCarousel\" data-slide-to=\""+ i +"\""+ active_indicator +"></li>";
		};
		sdf_carousel = sdf_carousel + "<li data-target=\"#sdfCarousel\" data-slide-to=\""+ i +"\"></li>";
		sdf_carousel = sdf_carousel + "</ol><div class=\"carousel-inner\">";
		
		
		for ( var i = 0; i < shuffled_slides.length; i++ ) {
			if (i == 0) active_indicator = ' active';
			else active_indicator = '';
			sdf_carousel = sdf_carousel + "<div class=\"item"+ active_indicator +"\"><div class=\"container\"><div class=\"carousel-caption\">"+ shuffled_slides[i].slide_cap + "<p><a class=\"btn btn-large btn-warning\" href=\""+ shuffled_slides[i].slide_link + "\" rel=\"nofollow\" target=\"_blank\">Read More</a></p></div></div></div>";
		};
		sdf_carousel = sdf_carousel + "<div class=\"item\"><div class=\"container\"><div class=\"carousel-caption\">"+ sds_promo_blog_post + "</div></div></div>";
		sdf_carousel = sdf_carousel + "</div><a class=\"left carousel-control\" href=\"#sdfCarousel\" data-slide=\"prev\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a><a class=\"right carousel-control\" href=\"#sdfCarousel\" data-slide=\"next\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a></div>";
		
		promo_carousel.html(sdf_carousel).delay(500).fadeIn(400).carousel({ interval:12000 });
	}	
	
	// dashboard widget
	$('#sdf_dashboard_widget h3.hndle span').html(banners_remote.dashboard_widget[0].title);
	$('#sdf_dashboard_widget .inside').html(banners_remote.dashboard_widget[0].content);
	setTimeout(function(){
		$('#sdf_dashboard_widget .inside').fadeIn(400);
	},800);

});
 
})(jQuery);

/**
 * Randomize array element order in-place.
 * Using Fisher-Yates shuffle algorithm.
 */
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}