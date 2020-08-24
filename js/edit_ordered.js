jQuery(document).ready(function($) {

	var total_prices=0;
	var total_price_old=0;

	$(document).on('click', '.edit', function(event) {
		event.preventDefault();
		var a_edit_id=$(this).attr('id');
		var array=a_edit_id.split("-");
		var id=array[1];

		var td_value=$("#item_count-"+id).text();
		total_price_old=$("#total_price-"+id).text();

		$("#item_count-"+id).empty();
		var td_text="<input class='inp_td' id='inp_td-" + id + "' type='number' min='0' value=" + td_value + " dir='ltr'>";
		$("#item_count-"+id).html(td_text);
	});

	$(document).on('keypress', '.inp_td', function(e) {
		if (e.which == 13) {
			var id_inp_td=$(this).attr('id');
			var array=id_inp_td.split("-");
			var id=array[1];

			var inp_td_val=$(this).val();
			var price=$("#price-"+id).text();
			var of_id=$("#off-"+id).text();
			var off=of_id.substr(0,2);

			$.ajax({
				url: 'edit_ordered.php',
				type: 'POST',
				data: 'id='+id + '&item_count='+inp_td_val,
				success: function(result){
					$("#item_count-"+id).empty();
					$("#item_count-"+id).text(inp_td_val);

					var total_off=inp_td_val *( ( price * off ) / 100 );
					var total_price=(inp_td_val * price) - total_off;

					$("#total_price-"+id).text(total_price);

					var producer_id=$("#total_price-"+id).attr('class');
					var total_prices_old=$("#total_prices-"+producer_id).text().substr(16);

					var total_prices_new=total_prices_old-total_price_old+total_price;
					$("#total_prices-"+producer_id).text("قیمت کل(تومان) : " + total_prices_new);
					// console.log(total_prices_old);
					// console.log(total_price_old);
					// console.log(total_price);

				}
			});
			
		}

	});

});