(function(){

	$(window).on('load', function(event) {

		setTimeout(function(){
			$('#sessionlogin').removeClass('animated bounceInDown')
											.addClass('animated bounceOutUp')
		}, 3000);

		setTimeout(function(){
			$('#sessionlogin').hide('1000');		
		}, 4000);
	});

})(); 
// end of IIFE