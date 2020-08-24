$(function() {
    var loaded_count = 0;

    function loadMore() {
        $.getJSON('show_producer_list.php?loaded_count=' + loaded_count + '&count=' + 4, load);
    }

    function load(data) {
        console.log(data);
        loaded_count+=4;
        var i=0;
        for (var cr in data) {

            if (data[cr].length == 0) {
                i++;
                continue;
            }
			itemData = data[cr];
			itemQuickshow = create_producer_list(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],i);
			$("#show_producer_list").append(itemQuickshow);
            i++;

        }


    }
    loadMore();

    $("#load-more").on('click', loadMore);

});