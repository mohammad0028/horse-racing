jQuery(document).ready(function($) {

	var no;
	var item_id;
	function load(data) {
		var itemQuickshow = create_comment(data[0], data[1], data[2]);
		$("#text-" + no + "-" +item_id).val("");
		$(itemQuickshow).insertAfter("#div-" + no + "-" + data[3]);
    };

	$(document).on('click', '.send', function(event){
		var id=$(this).attr('id');

		var array=id.split("-");
		no=array[1];
		item_id=array[2];
		loaded_count[item_id]++;
		var cm_text=$("#text-" + no + "-" +item_id).val();

		$.getJSON('send_comment.php?cm_text=' + cm_text + '&item_id=' + item_id , load);

	});
});