jQuery(document).ready(function($) {

	var item_id=0;
	var no;

	function load(data) {
        console.log(data);
        $("#comment-" + no + item_id).css('display', 'block');
        $("#btn-" + no + "-" + item_id ).css('display', 'block');

        for (var cr in data) {
			itemData = data[cr];
			itemQuickshow = create_comment(itemData['0'], itemData['1'], itemData['2']);
			$("#comment-"+ no + item_id).append(itemQuickshow);
			loaded_count[item_id]++;
        }
    }
    
	$(document).on('click', '.show_comment', function(event) {
		no=$(this).attr('id').split("-")[0];
		item_id=$(this).attr('id').split("-")[1];

		loaded_count[item_id]=0;
		$(this).css('display', 'none');

	    $.getJSON('show_comment.php?loaded_count=' + 0 + '&count=' + 4 + '&item_id=' + item_id , load);

	});

	$(document).on('click', '.load-more-comment', function(event) {
		var btn_load_more=$(this).attr('id');
		var array=btn_load_more.split("-");
		item_id=array[2];
		no=array[1];
		console.log(item_id);
		$.getJSON('show_comment.php?loaded_count=' + loaded_count[item_id] + '&count=' + 4 + '&item_id=' + item_id , load);
	});

});
