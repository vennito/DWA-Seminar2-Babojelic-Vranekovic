$( document ).ready(function() {
	var settings = {
    rows: 12,
    cols: 20,
    rowCssPrefix: 'row-',
    colCssPrefix: 'col-',
    seatWidth: 32,
    seatHeight: 32,
    seatCss: 'seat',
    selectedSeatCss: 'selectedSeat',
    selectingSeatCss: 'selectingSeat'
	};

	var init = function (reservedSeat) {
		var str = [], seatNo, className;
		for (i = 0; i < settings.rows; i++) {
			for (j = 0; j < settings.cols; j++) {
				seatNo = (j + i * settings.cols + 1);
				className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
				if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
					className += ' ' + settings.selectedSeatCss;
				}
				str.push('<li class="' + className + '"' +
				'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
				'<a title="' + seatNo + '">' + seatNo + '</a>' +
				'</li>');
			}
		}
		$('#place').html(str.join(''));
	};

	var id = $("#rezerviraj").attr('rel');
	var dan = $("#vrijeme").val();

	init(bookedSeats);
				
				
	$('.' + settings.seatCss).click(function () {
	if ($(this).hasClass(settings.selectedSeatCss)){
		alert('Mjesto je već zauzeto!');
	}
	else{
		$(this).toggleClass(settings.selectingSeatCss);
		}
	});
	 
	$('#btnShow').click(function () {
		var str = [];
		$.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
			str.push($(this).attr('title'));
		});
		alert(str.join(','));
	});
	 
	$('#btnShowNew').click(function () {
		var str = [], item;
		$.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
			item = $(this).attr('title');                   
			str.push(item);                   
		});
		alert(str.join(','));
	});
	
	$("#rezerviraj").click(function(){
		var str = [], item;
		$.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
			item = $(this).attr('title');                   
			str.push(item);                   
		});
		$.ajax({        
		   type: "POST",
		   url: "stolice.php",
		   data: { idflim: id, dan: dan, stolice: str },
		   success: function(data) {
				if(data == 1){
					alert( "Mjesta uspiješno rezervirana");
					window.location = "stolice.php?id="+id+"&dan="+dan;
				}else{
					alert( "Greška kod rezervacije");
					window.location = "index.php";
				}
		   }
		}); 
	});
});