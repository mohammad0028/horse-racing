jQuery(document).ready(function($) {

	function insert_buylist(result){
		console.log(result);

		for (var cr in result) {
			itemData = result[cr];
			var date=itemData['3'].split(" ")['0'];
			
			var inserted_html=
			"<p style='text-indent:10px; text-align:justify; text-justify:inter-word; padding:0px 10px;'>شما از تولید کننده <span style='font-weight:bold;'>" + itemData['1'] + "</span> در تاریخ <span dir='ltr'>" + date + "</span> مبلغ " + itemData['2'] + " جنس خریداری کرده اید.</p>"+
			"<button class='recent_show_more btn btn-primary' id='" + itemData['0'] + "'><i class='fa fa-mail-reply btn-xs'></i> مشاهده جزئیات</button><hr>";
			$("#recent_buylist").append(inserted_html);
        }
		
	}
	
	$.getJSON('recent_buylist.php', insert_buylist);

	$(document).on('click', '.recent_show_more', function(event) {
		event.preventDefault();
		
		var buy_id=$(this).attr('id');
		console.log(buy_id);
		var total_price=0;

		function Preparation_modal(result){

			console.log(result);
			$("#modal_content").empty();

			for (var cr in result) {
				itemData = result[cr];
				modal_content = create_salelist(itemData['0'], itemData['1'], itemData['2'], itemData['3'], itemData['4']);
				console.log(modal_content);
				$("#modal_content").append(modal_content);
				total_price=itemData['5'];
			}

			$("#modal_content").append("<p>قیمت کل : " + total_price + "</p>" + "<p>شناسه خرید: " + buy_id + "</p>");
			$("#transaction_detaile").modal();

		}
		$.getJSON('recent_show_more_buylist.php?buy_id=' + buy_id, Preparation_modal);
	});

});