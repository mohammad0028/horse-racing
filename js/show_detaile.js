jQuery(document).ready(function($) {
	
	$(document).on('click', '.show_detaile', function(event) {
		event.preventDefault();
		
		var array=$(this).attr('id').split("-");
		var transaction_id=array[1];
		console.log(transaction_id);

		var company_name=$("#company_name-"+transaction_id).text();
		var buy_id=$("#buy_id-"+transaction_id).text();
		var total_price=$("#total_price-"+transaction_id).text();

		function Preparation_modal(result){

			console.log(result);
			$(".modal-body").empty();
			for (var cr in result) {
				itemData = result[cr];
				modal_content = create_modalcontent(itemData['0'], itemData['1'], itemData['2'], itemData['3'], company_name);
				$(".modal-body").append(modal_content);
			}

			$(".modal-body").append("<p>قیمت کل : " + total_price + "</p>" + "<p>شناسه خرید: " + buy_id + "</p>");
			$("#transaction_detaile").modal();

		}

		$.getJSON('show_detaile.php?transaction_id=' + transaction_id + '&company_name=' +company_name + '&buy_id='+buy_id  + '&total_price='+total_price , Preparation_modal);
		
	});

	
});