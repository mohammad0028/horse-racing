jQuery(document).ready(function($) {
	$(document).on('click', '.show_more', function(event) {
		event.preventDefault();
		
		var count=$(this).attr('id');
		console.log(count);
		var buy_id=$("#buy_id-"+count).text();
		var company_name=$("#company_name-"+count).text();
		var total_price=$("#total_price-"+count).text();
		console.log(buy_id);

		function Preparation_modal(result){

			console.log(result);
			$(".modal-body").empty();

			for (var cr in result) {
				itemData = result[cr];
				modal_content = create_salelist(itemData['0'], itemData['1'], itemData['2'], itemData['3'], company_name);
				console.log(modal_content);
				$(".modal-body").append(modal_content);
			}

			$(".modal-body").append("<p>قیمت کل : " + total_price + "</p>" + "<p>شناسه خرید: " + buy_id + "</p>");
			$("#transaction_detaile").modal();

		}

		$.getJSON('show_more_salelist.php?buy_id=' + buy_id, Preparation_modal);		

	});

	// $(document).on('click', '.not_checked', function(event) {
	// 	event.preventDefault();
		
	// 	var count=$(this).attr('id').split("-")[1];
	// 	var buy_id=$("#buy_id-"+count).text();

	// 	$.ajax({
	// 		url: 'salelist_notchecked.php',
	// 		type: 'POST',
	// 		data: 'buy_id='+buy_id,
	// 		success: function(){
	// 			location.replace("SaleList.php");
	// 		}
	// 	});

	// });

	// $(document).on('click', '.checked_show_more', function(event) {
	// 	event.preventDefault();
		
	// 	var count=$(this).attr('id').split("-")[1];
	// 	var buy_id=$("#checked_buy_id-"+count).text();
	// 	var company_name=$("#checked_company_name-"+count).text();
	// 	var total_price=$("#checked_total_price-"+count).text();

	// 	function Preparation_modal(result){

	// 		console.log(result);
	// 		$(".modal-body").empty();

	// 		for (var cr in result) {
	// 			itemData = result[cr];
	// 			modal_content = create_salelist(itemData['0'], itemData['1'], itemData['2'], itemData['3'], company_name);
	// 			$(".modal-body").append(modal_content);
	// 		}

	// 		$(".modal-body").append("<p>قیمت کل : " + total_price + "</p>" + "<p>شناسه خرید: " + buy_id + "</p>");
	// 		$("#transaction_detaile").modal();

	// 	}

	// 	$.getJSON('show_more_salelist.php?buy_id=' + buy_id, Preparation_modal);		

	// });


});