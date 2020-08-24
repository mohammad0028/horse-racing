jQuery(document).ready(function() {

	$.ajax({
		url: 'check_isfilled_retailer.php',
		type: 'POST',
		success: function(resultdata){
			var result=$.trim(resultdata);

			console.log(result);
			if (result == "not_ok") {
				$("#myModal").modal();
                $("#myModal").on('hidden.bs.modal', function() {
                	location.replace("Account.php");
                });
			}
			
		}

	});
	
});