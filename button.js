$(document).ready(function(){

	var map_block_top = parseInt($('.map-block').css('top'));
	map_block_top = map_block_top*0.4 + 'px';
	var map_block_bottom = $('.map-block').css('top');

	console.log(map_block_top);

	$('.map__button').click(function(){
		if($('.map-block').css('top') == map_block_bottom) {
			$('.map-block').animate({top: map_block_top}, 500);
		} else if($('.map-block').css('top') == map_block_top) {
			$('.map-block').animate({top: map_block_bottom}, 500);
		}
	})
})