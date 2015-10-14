$(document).ready(function() {



$(".FeaturedNews").owlCarousel({
itemsCustom : [
[0, 1],
[450, 1],
[600, 2],
[700, 2],
[1000, 2],
[1200, 2],
[1400, 3],
[1600, 3]
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});


$(".LatestNewsBlock").owlCarousel({
itemsCustom : [
[0, 1],
[450, 1],
[600, 2],
[700, 2],
[1000, 2],
[1200, 4],
[1400, 4],
[1600, 4]
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});


$(".EgyptAndTheWorldBlock").owlCarousel({
itemsCustom : [
[0, 1],
[450, 1],
[600, 2],
[700, 2],
[1000, 2],
[1200, 4],
[1400, 4],
[1600, 4]
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});


$('.TechnologyAndScinceBlock').owlCarousel({
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
[700, 2],
[1000, 3],
[1200, 4],
[1400, 4],
[1600, 4]
],
navigation : false,
pagination: false,
autoPlay : true,
slideSpeed : 300,
stopOnHover : true
});


$(".ArticlesBlock").owlCarousel({
singleItem:true,
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




});  // end of all

//
//function customCarousel(  ){
//	
//		$(".FeaturedNews").owlCarousel({
//		itemsCustom : [
//		[0, 1],
//		[450, 1],
//		[600, 2],
//		[700, 2],
//		[1000, 2],
//		[1200, 2],
//		[1400, 3],
//		[1600, 3]
//		],
//		navigation : false,
//		pagination: false,
//		autoPlay : true,
//		slideSpeed : 300,
//		stopOnHover : true
//		});
//}
