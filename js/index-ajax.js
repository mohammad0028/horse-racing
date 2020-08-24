jQuery(document).ready(function() {

  $("#login").click(function() {

    var login_email=$("#login-email").val();
    var login_pass=$("#login-password").val();
    var login_usertype=$("#login-usertype").val();

    var login_remember=$("#login-remember").is(':checked');


    $.ajax({
      url: "logincheck.php",
      type: "post",
      data: "login_email=" + login_email +"&login_pass=" + login_pass +"&login_usertype=" +login_usertype+"&login_remember=" +login_remember,
      success :function(data)
      {
        var result = $.trim(data);
        console.log(result);
        if ( result == "email-pass-mistake") {

          $("#login-warning").css('display', 'block !important');
          $("#login-warning").text('پست الکترونیک یا رمز عبور اشتباه است.');
          $(".index-form").fadeIn();
          $("#login-form").fadeIn();
          $("#register-form").css("display", "none");
          $("#login-li").addClass("active");
          $("#register-li").removeClass("active");
          $("#hide").fadeIn();
          $("body").css("overflow-Y","hidden");
          $("#services , #best, #about, #contact , .nav-a , #homeHeading").css("display", "none");
          $("header").css("min-height", "100%");  
          $(".index-form").css("z-index", "1050");
          $("#login-email").val(login_email);
          $("#login-password").val(login_pass);
          $("#login-usertype").val(login_usertype);
          $("#login-remember").is(':checked');

        }
        else if( result == "status-null" ){
          $("#login-warning").css('display', 'block');
          $("#login-warning").text('حساب کاربری شما فعال نشده است.');
          $(".index-form").fadeIn();
          $("#login-form").fadeIn();
          $("#register-form").css("display", "none");
          $("#login-li").addClass("active");
          $("#register-li").removeClass("active");
          $("#hide").fadeIn();
          $("body").css("overflow-Y","hidden");
          $("#services , #best, #about, #contact , .nav-a , #homeHeading").css("display", "none");
          $("header").css("min-height", "100%");  
          $(".index-form").css("z-index", "1050");

          $("#login-email").val(login_email);
          $("#login-password").val(login_pass);
          $("#login-usertype").val(login_usertype);
          $("#login-remember").is(':checked');
        }
        else if( result == "ok" ){
          if ( login_usertype == 1 ) {
            location.replace("producer.php");
          }
          else{
            location.replace("retailer.php");
          }
        }

      }
    });
  });

  $("#forgot-btn").click(function(event) {
    var email=$("#forgot-email").val();
    $.ajax({
      url: 'forgotcheck.php',
      type: 'POST',
      data: 'forgot_email='+email,
      success :function(data){
        var result=$.trim(data);
        if (result == "producer" || result == "retailer") {
          $("#warning-forgot").css('display', 'block');
          $("#warning-forgot").text('رمز عبور ارسال شد.');
        }
        else {
          $("#warning-forgot").css('display', 'block');
          $("#warning-forgot").text('شما هنوز ثبت نام نکرده اید.');
        }
      }
    });
  });


});
