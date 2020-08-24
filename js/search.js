$(function() {
    function show_search() {
        var inp_search = $("#inp_search").val();   
        if (inp_search != "") {
            $("#end_search").fadeIn();
            $("#load-more").css('display', 'none');  
            $.getJSON('search.php?search_input=' + inp_search, load);
        }
    }

    function load(data) {
        console.log(data);

        $("#quick-show").empty();
        $(".remove").remove();

        if (data.length == 0) {
            itemQuickshow='<div style="color:red; font-size:20px; margin-top:20px;">هیچ موردی یافت نشد.</div>';
            $("#quick-show").append(itemQuickshow);
        }
        else{
            for (var cr in data) {
                itemData = data[cr];
                itemQuickshow = create_quickshow(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],itemData['7'],itemData['8']);
                $("#quick-show").append(itemQuickshow);
            }
        }
        
    }

    $("#btn_search").on('click', show_search);

    $("#end_search").on('click', function(event) {
        location.replace("Producer.php");
    });
});
