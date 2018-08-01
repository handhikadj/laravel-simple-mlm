(function(){

	$(window).on('load', function(event) {

		setTimeout(function(){
			$('#sessionlogin').removeClass('animated bounceInDown')
											.addClass('animated bounceOutUp')
		}, 3000);

		setTimeout(function(){
			$('#sessionlogin').hide('1000');		
		}, 4000);

		setTimeout(function(){
			$('.invalid-feedback').addClass('animated fadeOutRight');
		}, 3000);
	});

})(); 
// end of IIFE