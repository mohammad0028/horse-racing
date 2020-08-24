jQuery(document).ready(function($) {

	$(document).on('click', '.buy_ordered', function(event) {
		event.preventDefault();

		var array=$(this).attr('id').split("-");
		var producer_id=array[1];
		var total_price=$("#total_prices-"+producer_id).text().substr(16);

		$.ajax({
			url: 'buy_ordered.php',
			type: 'POST',
			data: 'producer_id='+producer_id + '&total_price='+total_price,
			success: function(result){
				location.replace("shopping_bag.php");
			}
		});
		
	});

});