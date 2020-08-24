jQuery(document).ready(function() {

	$.ajax({
		url: 'check_isfilled.php',
		type: 'POST',
		success: function(resultdata){
			var result=$.trim(resultdata);

			console.log(result);
			if (result == "not_ok") {
				$("#myModal").modal();
                $("#myModal").on('hidden.bs.modal', function() {
                	location.replace("profile.php");
                });
			}
			
		}

	});
	
});