( function( $ ) {
//$(".Fill").imgLiquid({fill:true});
$('.VCenter').flexVerticalCenter();
 

var Featured_mobile =  parseInt($(".FeaturedNews").data('mobile') , 10 );
var Featured_tablet = parseInt($(".FeaturedNews").data('tablet') , 10 );
var Featured_desktop =  parseInt($(".FeaturedNews").data('desktop') , 10 );

$(".FeaturedNews").owlCarousel({
itemsCustom : [
[0, Featured_mobile],
[600, Featured_tablet],
[1400, Featured_desktop],
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});


var Latest_mobile =  parseInt($(".LatestNewsBlock").data('mobile') , 10 );
var Latest_tablet = parseInt($(".LatestNewsBlock").data('tablet') , 10 );
var Latest_desktop =  parseInt($(".LatestNewsBlock").data('desktop') , 10 );

$(".LatestNewsBlock").owlCarousel({
itemsCustom : [
[0, Latest_mobile],
[600, Latest_tablet],
[1200, Latest_desktop],
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});


var Wide_mobile =  parseInt($(".WideNewsBlock").data('mobile') , 10 );
var Wide_tablet = parseInt($(".WideNewsBlock").data('tablet') , 10 );
var Wide_desktop =  parseInt($(".WideNewsBlock").data('desktop') , 10 );

$(".WideNewsBlock").owlCarousel({
itemsCustom : [
[0, Wide_mobile],
[600, Wide_tablet],
[1200, Wide_desktop],
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});

var Horizontal_mobile =  parseInt($(".HorizontalNewsBlock").data('mobile') , 10 );
var Horizontal_tablet = parseInt($(".HorizontalNewsBlock").data('tablet') , 10 );
var Horizontal_desktop =  parseInt($(".HorizontalNewsBlock").data('desktop') , 10 );

$('.HorizontalNewsBlock').owlCarousel({
itemsCustom : [
[0, Horizontal_mobile],
[600, Horizontal_tablet],
[1200, Horizontal_desktop],
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});





$('.MostReadCat').owlCarousel({
itemsCustom : [
[0, 1],
[450, 1],
[600, 1],
[700, 1],
[1000, 1],
[1200, 1],
[1400, 1],
[1600, 1]
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});





$('.MediaBlocks').owlCarousel({
itemsCustom : [
[0, 1],
[450, 1],
[600, 1],
[700, 1],
[1000, 2],
[1200, 2],
[1400, 2],
[1600, 2]
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});


$('.ImgsGallery').owlCarousel({
itemsCustom : [
[0, 1],
[450, 1],
[600, 2],
[700, 3],
[1000, 4],
[1200, 6],
[1400, 8],
[1600, 8]
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});



$('.GalleryShow').owlCarousel({
navigation : false, // Show next and prev buttons
pagination:false,
lazyLoad : true,
slideSpeed : 300,
paginationSpeed : 400,
singleItem:true
});

var Gallery = $(".GalleryShow").data('owlCarousel');

$('.GalleryThumb').click(function(){
	var order = $(this).data("order");
	Gallery.goTo(order);
});


  
//$(".ArticlesBlock").owlCarousel({
//singleItem:true,
//navigation : false,
//pagination: false,
//autoPlay : true,
//slideSpeed : 300,
//stopOnHover : true
//});


var Article_mobile =  parseInt($(".ArticlesBlock").data('mobile') , 10 );
var Article_tablet = parseInt($(".ArticlesBlock").data('tablet') , 10 );
var Article_desktop =  parseInt($(".ArticlesBlock").data('desktop') , 10 );

$(".ArticlesBlock").owlCarousel({
itemsCustom : [
[0, Article_mobile],
[600, Article_tablet],
[1200, Article_desktop],
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});




$(".Gallery").colorbox({
	rel:'Gallery',
	slideshow:true,
	transition:"elastic"
	});
$('.PostContainer').sticky();
$('.PostContainer').on('sticky-start', function() { 
	$(this).addClass("StickyTitle");
 });

$('.PostContainer').on('sticky-end', function() { 
	$(this).removeClass("StickyTitle");
 });


$('.EgyptAndTheWorldBlock .Block:even').addClass("oddblock");




} )( jQuery );  // end of all

 
