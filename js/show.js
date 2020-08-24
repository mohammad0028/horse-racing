$(function() {
    var loaded_count = 0;

    function loadMore() {
        $.getJSON('show_producer_item.php?loaded_count=' + loaded_count + '&count=' + 3 +'&id=' + id, load);
    }

    function load(data) {
        console.log(data);
        
        for (var cr in data) {
			itemData = data[cr];
			itemQuickshow = create_item(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],itemData['7'],itemData['8']);
			$("#show_producer_item").append(itemQuickshow);
			loaded_count++;
        }
    }
    loadMore();

    $("#load-more").on('click', loadMore);


});
