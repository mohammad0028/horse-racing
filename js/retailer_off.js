$(function() {

    function show_off() {
        $.getJSON('retailer_off.php', load);
    }

    function load(data) {
        console.log(data);
        $("#off").empty();
        for (var cr in data) {
			itemData = data[cr];
			itemQuickshow = create_quickshow(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],itemData['7'],itemData['8'],'off');
			$("#off").append(itemQuickshow);	
        }
    }
    show_off();

    $("#firsttab").on('click', show_off);

});
