$(function() {

    function show_sale() {
        $.getJSON('retailer_sale.php', load);
    }

    function load(data) {

        $("#sale").empty();
        for (var cr in data) {
			itemData = data[cr];
			itemQuickshow = create_quickshow(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],itemData['7'],itemData['8'],'sale');
			$("#sale").append(itemQuickshow);	
        }
    }

    $("#second").on('click', show_sale);

});
