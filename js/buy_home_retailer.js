jQuery(document).ready(function($) {

	$(document).on('click', '.buy', function(event) {
		event.preventDefault();
		
		var btn_buy_item=$(this).attr('id');
		var array=btn_buy_item.split("-");
		var no=array[1];
		var item_id=array[2];
		var item_count=$("#item-count-"+no+"-"+item_id).val();

		if (item_count >= 1) {
			
			$.ajax({
				url: 'buy_home_retailer.php',
				type: 'POST',
				data: 'item_id='+item_id + '&item_count='+item_count,
				success: function(resultdata){
					$("#warning-"+no+"-"+item_id).css('display', 'none');
					$("#success-"+no+"-"+item_id).fadeIn();
					$("#success-"+no+"-"+item_id).fadeOut(3000);
				}
			});
			
		}
		else{
			$("#warning-"+no+"-"+item_id).fadeIn();
		}
	});


});