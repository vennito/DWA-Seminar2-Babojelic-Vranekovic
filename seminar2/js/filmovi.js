$( document ).ready(function() {
    var dan = $(".active").attr('rel');
	var id = 0;
	$( ".tabsdatum" ).click(function() {
		dan = $(this).attr('rel');
		$(".tabsdatum").removeClass( "active" );
		$(this).addClass( "active" );
	});
	
	$(".ulaznice-btn").click(function() {
		if(dan == 0){
			alert("Niste odabrali dan!");
		}else{
			id = $(this).attr('rel');
			$.get( "stolice.php", { id: id, dan: dan } );
			window.location = "stolice.php?id="+id+"&dan="+dan;
		}
	});
	
});