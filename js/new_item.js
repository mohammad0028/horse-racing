$(document).ready(function() {
	
	function show_new(result){
		$.getJSON('new_item.php',load);
	}
	

    function load(data) {
        console.log(data);
        $("#new").empty();
        for (var cr in data) {
			itemData = data[cr];
			itemQuickshow = create_quickshow(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],itemData['7'],itemData['8'],'new');
			$("#new").append(itemQuickshow);	
        }
    }
    show_new();

    $("#third").on('click', show_new);
});