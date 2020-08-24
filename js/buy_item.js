jQuery(document).ready(function($) {

	$(document).on('click', '.buy', function(event) {
		event.preventDefault();
		
		var btn_buy_item=$(this).attr('id');
		var array=btn_buy_item.split("-");
		var item_id=array[1];
		var item_count=$("#item_count-"+item_id).val();

		if (item_count >= 1) {
			
			$.ajax({
				url: 'buy_item.php',
				type: 'POST',
				data: 'item_id='+item_id + '&item_count='+item_count + '&producer_id='+id ,
				success: function(resultdata){
					$("#warning-"+item_id).css('display', 'none');
					$("#success-"+item_id).fadeIn();
					$("#success-"+item_id).fadeOut(3000);
				}
			});
			
		}
		else{
			$("#warning-"+item_id).fadeIn();
		}
	});


});