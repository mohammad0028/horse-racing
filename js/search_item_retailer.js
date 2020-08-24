$(function() {
    function show_search() {
        $("#end_search").fadeIn();
        var inp_search = $("#inp_search").val();
        console.log(inp_search);
        $.getJSON('search_item_retailer.php?search_input=' + inp_search + '&id=' + id, load);
    }

    function load(data) {
        console.log(data);

        $("#show_producer_item").empty();
        $(".remove").remove();

        if (data.length == 0) {
            itemQuickshow='<div style="color:red; font-size:20px; margin-top:20px;">هیچ موردی یافت نشد.</div>';
            $("#show_producer_item").append(itemQuickshow);
        }
        else{
            for (var cr in data) {
                itemData = data[cr];
                itemQuickshow = create_item(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],itemData['7'],itemData['8']);
                $("#show_producer_item").append(itemQuickshow);
            }
        }
        
    }

    $("#btn_search").on('click', show_search);

    $("#end_search").on('click', function(event) {
        location.replace("producer_item.php?id="+id);
    });
});
