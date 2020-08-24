jQuery(document).ready(function($) {

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

  $('#new-pass , #renew-pass , #old-pass').delayinput(function()
    { 
      var oldpass=$("#old-pass").val();
      var password=$("#new-pass").val();
      var passwordlength=$("#new-pass").val().length;
      var password2=$("#renew-pass").val();
      var passwordlength2=$("#renew-pass").val().length;

      console.log(oldpass);
      
      if ( (passwordlength == 0 && passwordlength2 == 0) || (passwordlength >= 6 && passwordlength2 == 0) || (passwordlength2 >= 6 && passwordlength == 0)){
        $("#warning").text("");
        $("#warning").css("display","none");
        $("#warning2").css("display","none");
        $("#warning2").text("");
      }
      else if (passwordlength >= 6 && passwordlength2 >= 6 && password == password2) {
        $("#warning").css("display","none");
        $("#warning").text("");
        $("#warning2").css("display","none");
        $("#warning2").text(""); 
      }

      else if(passwordlength < 6 && passwordlength != 0 && passwordlength2 != 0 && passwordlength2 < 6)
      {
        $("#warning").css("display","block");
        $("#warning").text("حداقل 6 کاراکتر وارد کنید");
        $("#warning2").css("display","block");
        $("#warning2").text("حداقل 6 کاراکتر وارد کنید");
      }
      else if(passwordlength >= 6 && passwordlength2 >= 6 && password != password2){
        $("#warning").css("display","none");
        $("#warning").text("");
        $("#warning2").css("display","block");
        $("#warning2").text("عدم تطابق با رمز عبور");
      }
      else if(passwordlength < 6 && passwordlength != 0 && passwordlength2 == 0)
      {
        $("#warning").css("display","block");
        $("#warning").text("حداقل 6 کاراکتر وارد کنید");
        $("#warning2").text("");
        $("#warning2").css("display","none");
      }
      else if (passwordlength == 0 && passwordlength2 != 0 && passwordlength2 < 6)
      {
        $("#warning").css("display","none");
        $("#warning").text("");
        $("#warning2").css("display","block");
        $("#warning2").text("حداقل 6 کاراکتر وارد کنید");
      }
      
      else if(passwordlength < 6 && passwordlength != 0 && passwordlength2 >= 6)
      {
        $("#warning").css("display","block");
        $("#warning").text("حداقل 6 کاراکتر وارد کنید");
        $("#warning2").css("display","block");
        $("#warning2").text("عدم تطابق با رمز عبور");
      }
      else if(passwordlength >= 6 && passwordlength2 != 0 && passwordlength2 < 6)
      {
        $("#warning").css("display","none");
        $("#warning").text("");
        $("#warning2").css("display","block");
        $("#warning2").text("عدم تطابق با رمز عبور");
      }

      if( oldpass == "" || password == "" || password2 == ""  || $("#warning").css('display') == "block" || $("#warning2").css('display') == "block" || $("#warning-oldpass").css('display') == "block" ){
        $("#change-pass").attr('disabled', 'true');
      }
      else{
        $("#change-pass").removeAttr('disabled');
      }

    }, 1000);
});