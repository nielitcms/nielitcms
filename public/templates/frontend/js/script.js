$(function(){
	$('.tools a').tooltip({
		'placement': 'top'
	});

	$('.tooltip-top').tooltip({
		'placement': 'top'
	});
	$('.tooltip-bottom').tooltip({
		'placement': 'bottom'
	});
	$('.tooltip-left').tooltip({
		'placement': 'left'
	});
	$('.tooltip-right').tooltip({
		'placement': 'right'
	});

	$(".photo a").colorbox({
		rel:'albumPhoto',
		transition: "elastic",
		maxWidth: "800px"
	});
});

function goToTop() {
	$("html, body").animate({
		scrollTop: 0
	}, 900);
}