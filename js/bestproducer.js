$(function() {

    $.getJSON('bestproducer.php', load);


    function load(data) {
        console.log(data);
        $("#bestproducer").empty();
        var len=data.length;
        if (len == 0) {
            $("#header_best").remove();
        }
        else{
            var first=data['0'];
            var second=data['1'];
            var third=data['2'];

            var itemQuickshow = create_bestproducer(first,second,third);
            $("#bestproducer").append(itemQuickshow);
        }

    }

});