jQuery(document).ready(function($) {
	
	function load_not_checked(result){

		for (var cr in result) {
			transaction_detail=result[cr];

			inserted_html=create_transaction_table(transaction_detail[0],transaction_detail[1],transaction_detail[2],transaction_detail[3],transaction_detail[4],transaction_detail[5],transaction_detail[6]);

			$("#transaction_table").append(inserted_html);

		}
	}


	$(document).on('click', '.page', function(event) {
		event.preventDefault();

		$('.active','.pagination').removeClass('active');
		$(this).addClass('active');

		var page=$(this).attr('id');
		$(".remove").remove();
		console.log(page_num);
		if (page != "first" && page != "last") {
			var page=parseInt(page);

			var not_exist=0;
			if (page != 1) {

				for (var i = page-2; i <= page+2; i++) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'block');
					}
					else{
						not_exist++;
					}

				}
				console.log(not_exist);
				for (var i = 1; i < page-not_exist-2; i++) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'none');
					}
				}
				for (var i = page+3; i < page+3+not_exist; i++) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'block');
					}
				}
				for (var i = page+3+not_exist; i <= page_num; i++) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'none');
					}
				}

			}
		}
		else{
			if (page == "first") {
				for (var i = 1; i <= 5; i++) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'block');
					}
				}
				for (var i = 6; i <= page_num; i++) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'none');
					}
				}
			}
			else{
				for (var i = page_num; i > page_num - 5; i--) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'block');
					}
				}
				for (var i = 1; i <= page_num-5; i++) {
					if ($("#"+i).length) {
						$("#"+i).css('display', 'none');
					}
				}
			}
		}

		

		$.getJSON('transaction_pager.php?page=' + page, load_not_checked);
	});


	$.getJSON('transaction_pager.php?page=' + 1, load_not_checked);
	$("#1").addClass('active');


});		
