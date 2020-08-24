$(document).ready(function (e) {
	
	$("form#data").submit(function(event){
	  event.preventDefault();
	  $("#notice").css('display', 'none');

	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	    url: 'ajax_php_itemregister.php',
	    type: 'POST',
	    data: formData,
	    async: false,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success: function (returndata) {
	      	var result=$.trim(returndata);
	      	console.log(result);
	      	if (result == "not-ok") {
	      		$("#notice").fadeIn();
	      		$("#notice").text("لطفا مجددا تلاش کنید.");
	      	}
	      	else if (result == "invalid") {
	      		$("#notice").fadeIn();
	      		$("#notice").text("فرمت یا سایز نامعتبر عکس.لطفا مجددا تلاش کنید.");
	      	}
	      	else{
	      		$("#notice").fadeIn();
	      		$("#notice").text("اطلاعات با موفقیت ثبت شد.");	      		
	      	}
	    }
	  });
	 
	  return false;
	});
	
});
