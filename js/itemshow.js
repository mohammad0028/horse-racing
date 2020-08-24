jQuery(document).ready(function($) {

	var name=0;
	var province=0;
	var inp_search;

	$("#name").click(function(event) {
		name=1;
		province=0;

		inp_search=$("#inp_search").val();

		if (inp_search != "") {
			$("#btn_search").removeAttr('disabled');
		}
		else{
			$("#btn_search").attr('disabled', 'true');
		}
	});

	$("#province").click(function(event) {
		province=1;
		name=0;

		inp_search=$("#inp_search").val();

		if (inp_search != "") {
			$("#btn_search").removeAttr('disabled');
		}
		else{
			$("#btn_search").attr('disabled', 'true');
		}
	});

	(function ($) {
      $.fn.delayinput = function(callback, ms){
          var timer = 0;
          $(this).on('input', function(event) {
            clearTimeout (timer);
              timer = setTimeout(callback, ms);
          });
          return $(this);
      };
	})(jQuery);

	$("#inp_search").delayinput(function(){

		inp_search=$("#inp_search").val();

		if ( inp_search != "" && ( name!=0 || province!=0 ) ) {
			$("#btn_search").removeAttr('disabled');
		}
		else{
			$("#btn_search").attr('disabled', 'true');
		}

	},500);

    function loadMore() {
    	$("#end_search").fadeIn();
        $.getJSON('search_retailer.php?inp_search=' + inp_search + '&name=' + name + '&province=' + province , load);
    }

    function load(data) {
        console.log(data);

        $("#show_producer_list").empty();
        $(".remove").remove();

        if (data.length == 0) {
        	itemQuickshow='<div style="color:red; font-size:20px; margin-top:20px;">هیچ موردی یافت نشد.</div>';
        	$("#show_producer_list").append(itemQuickshow);
        }
        else{
	        var i=0;
	        for (var cr in data) {
				itemData = data[cr];
				itemQuickshow = create_producer_list(itemData['0'], itemData['1'], itemData['2'], itemData['3'],itemData['4'],itemData['5'],itemData['6'],i);
				$("#show_producer_list").append(itemQuickshow);
	            i++;
	        }	
        }
        
    }

	$("#btn_search").on('click', loadMore);

	$("#end_search").on('click', function(event) {
		location.replace("Itemshow.php");
	});



});