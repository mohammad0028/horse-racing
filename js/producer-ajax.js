jQuery(document).ready(function() {

  $("#personal_change").click(function(event) {

    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var tel=$("#tel").val();


    $.ajax({
      url: 'checkpersonal.php',
      type: 'POST',
      cache: false,
      data: "fname="+fname + "&lname="+lname + "&tel="+tel,
      success :function(){
        $("#personal-warning").fadeIn();
        $("#personal-warning").text("تغییرات با موفقیت اعمال گردید.");
        $("#personal-warning").fadeOut(10000);
      }
    });
    
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

  $("#old-pass").delayinput(function(){
    var oldpass=$("#old-pass").val();
    
    $.ajax({
      url: 'checkpass.php',
      type: 'POST',
      cache: false,
      data: 'oldpass='+oldpass,
      success :function(data){
        var result=$.trim(data);
        if (result == "not-true") {
          $("#warning-oldpass").css('display', 'block');
          $("#warning-oldpass").text('رمز پیشین نادرست میباشد.');
        }
        else{
          $("#warning-oldpass").css('display', 'none');
          $("#warning-oldpass").text('');
        }
      }
    });

  },1000);

  $("#change-pass").click(function() {
    var newpass=$("#new-pass").val();

    $.ajax({
      url: 'changepass.php',
      type: 'POST',
      cache: false,
      data: 'newpass='+newpass,
      success :function(){

        $("#change-pass-success").fadeIn();
        $("#change-pass-success").text('تغییرات با موفقیت اعمال گردید.');
        $("#change-pass-success").fadeOut(10000);
      }
    });
        
  });

  $("#province").delayinput(function(){
    var province_id=$("#province option:selected").val();
    $("#city .remove").remove();

    $.ajax({
      url: 'city.php',
      type: 'POST',
      cache: false,
      data: "province_id="+province_id,
      success :function(data){
        var result=$.trim(data);
        $("#city").append("<option class='remove' disabled>------------------</option>");
        $("#city").append(result);

      }
    });
    
  },1000); 

  $("#company_change").click(function(event) {
    var name=$("#company-name").val();
    var code=$("#company-code").val();
    var province=$("#province option:selected").val();
    var city=$("#city option:selected").val();
    var tel=$("#company-tel").val();
    var resume=$("#resume").val();

    $.ajax({
      url: 'changecompany.php',
      type: 'POST',
      cache: false,
      data: 'name='+name + '&code='+code + '&province='+province + '&city='+city + '&tel='+tel + '&resume='+resume ,
      success :function(data){
        $("#change-company-success").fadeIn();
        $("#change-company-success").text('تغییرات با موفقیت اعمال گردید.');
        $("#change-company-success").fadeOut(10000);
      }
    });
    
  });


});



// profile image
$(document).ready(function (e) {
  $("#uploadimage").on('submit',(function(e) {
    e.preventDefault();
    // $("#message").empty();
    // $('#loading').show();
    $.ajax({
      url: "ajax_php_file.php", // Url to which the request is send
      type: "POST",             // Type of request to be send, called as method
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cached
      processData:false,        // To send DOMDocument or non processed data file it is set to false
      success: function(data)   // A function to be called if request succeeds
      {
        var result=$.trim(data);
        if (result == "not-ok") {
          $("#img-warning").fadeIn();
          $("#img-warning").text("عمل بارگذاری را مجددا انجام دهید.");
          $("#img-warning").fadeOut(10000);
        }
        else if (result == "invalid") {

          $("#img-warning").fadeIn();
          $("#img-warning").text("سایز یا فرمت نامعتبر تصویر.");
          $("#img-warning").fadeOut(10000);
        }
        else
        {
          $("#img-warning").fadeIn();
          $("#img-warning").css('color', 'rgb(92, 184, 92)');
          $("#img-warning").text("تصویر مورد نظر با موفقیت ثبت شد.");
          $("#img-warning").fadeOut(10000);
          $("#img-warning").css('color', 'red');

        }
      }
    });


}));

// Function to preview image after validation
  $(function() {
    $("#file").change(function() {
      // $("#message").empty(); // To remove the previous error message
      
      var file = this.files[0];
      console.log(file);
      var imagefile = file.type;
      console.log(imagefile);
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
      {
        $('#previewing').attr('src','noimage.png');
        // $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
        return false;
      }
      else
      {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        console.log(reader);
        reader.readAsDataURL(this.files[0]);
      }
    });
  });


  function imageIsLoaded(e) {
    $("#file").css("color","green");
    $('#image_preview').css("display", "block");
    $('#previewing').attr('src', e.target.result);
    $('#previewing').attr('width', '250px');
    $('#previewing').attr('height', '230px');
  };
 
});