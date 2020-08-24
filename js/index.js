jQuery(document).ready(function($)
  {
    $(window).scroll(function(event)
    {
      if ($(this).scrollTop() >= $("header").innerHeight())
      {
        $("#top").slideDown('100');

      }
      else
      {
        $("#top").slideUp('100');
      };
    });  
  });


  $(document).ready(function()
  {
    $(".nav-a").on('click', function(event)
    {
      if (this.hash !== "")
      {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
        scrollTop: $(hash).offset().top
        }, 1000, function(){
        window.location.hash = hash;
        });
      }
    });
  });


  $(document).ready(function()
  {
	  
	  
	  
//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scroll-top').fadeIn();
		} else {
			$('.scroll-top').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scroll-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

  });



  $(document).ready(function()
  {

    $(".login-btn").click(function(event) {
      $("#login-form").fadeIn();
      $("#register-form").css('display', 'none');
      $("#login-li").addClass('active');
      $("#register-li").removeClass('active');
    });
    
    $(".register-btn").click(function(event) {
      $("#register-form").fadeIn();
      $("#login-form").css('display', 'none');
      $("#register-li").addClass('active');
      $("#login-li").removeClass('active');
    });

    $(".login-btn , .register-btn").click(function(event) {
      $(".index-form").fadeIn();
      $("#hide").fadeIn();
      $("#forgot-form").css('display','none');
      $("body").css('overflow-Y','hidden');
      $("#services , #best, #about, #contact , .nav-a , #homeHeading").css('display', 'none');
      $("header").css('min-height', '100%');  
      $(".index-form").css('z-index', '1050');
      $("#warning-forgot").text("");
    });

    $("#login-a").click(function(event) {
      $("#login-form").fadeIn();
      $("#register-form").css('display', 'none');
      $("#forgot-form").css('display','none');
      $("#login-li").addClass('active');
      $("#register-li").removeClass('active');
      $("#warning-forgot").text("");
    });

    $("#register-a").click(function(event) {
      $("#register-form").fadeIn();
      $("#login-form").css('display','none');
      $("#forgot-form").css('display','none');
      $("#register-li").addClass('active');
      $("#login-li").removeClass('active'); 
      $("#warning-forgot").text("");  
    });

    $("#close").click(function(event) {
      $("#login-warning").text("");
      $("#register-warning").text("");
      $("#warning-forgot").text("");
      $(".index-form").fadeOut();
      $("#hide").fadeOut();
      $("body").css('overflow-Y','visible');
      $("#services , #best, #about, #contact , .nav-a , #homeHeading").css('display', 'block');
      $(".index-form").css('z-index', '1001');

      if( $(window).width() < 768 ){$("header").css('min-height', 'auto');}
      else {$("header").css('min-height', '100%');}


    });
    $("#forgot-a").click(function(event) {
      $("#login-form").css('display', 'none');
      $("#sregister-form").css('display', 'none');
      $("#register-li").removeClass('active');
      $("#login-li").removeClass('active'); 
      $("#forgot-form").fadeIn();

    });

  });


$(document).ready(function() {
  
  $("#regiter-user-type").change(function(event) {
    var password=$("#register-password").val();
    var passwordlength=$("#register-password").val().length;
    var password2=$("#register-password2").val();
    var passwordlength2=$("#register-password2").val().length;
    var user_type=$('#regiter-user-type').val();
    if ( (passwordlength >= 6 && passwordlength2 >= 6 && password == password2 && user_type != 0) || (passwordlength == 0 && passwordlength2 == 0) ) {
      $("#register-btn").removeAttr('disabled');
    }
    else{
      $("#register-btn").attr('disabled', 'true');
    }
  });

  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

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

  $('#login-email , #login-password , #login-usertype').delayinput(function()
    { 
      var le=$("#login-email").val();
      var lp=$("#login-password").val().length;
      var lu=$("#login-usertype").val();

      if (lp < 6 && lp != 0) {
          $("#pass-warning").css("display","block");
          $("#pass-warning").text("حداقل 6 کاراکتر وارد کنید");
      }
      else{
        $("#pass-warning").text("");
        $("#pass-warning").css("display","none");
      }

      if ( !validateEmail(le) && le != "") {
        $("#email-warning").css("display","block");
        $("#email-warning").text("پست الکترونیک معتبر نیست.");
      }
      else{
        $("#email-warning").css("display","none");
        $("#email-warning").text("");
      }
      if( le == "" || !validateEmail(le) || lp < 6 || lu == 0 ){
        $("#login").prop('disabled', 'true');
      }
      else{
        $("#login").removeAttr('disabled');
      }
    }, 1000 );



  $('#register-password , #register-password2 ,#register-email , #register-usertype').delayinput(function()
    { 
      var email=$("#register-email").val();
      var password=$("#register-password").val();
      var passwordlength=$("#register-password").val().length;
      var password2=$("#register-password2").val();
      var passwordlength2=$("#register-password2").val().length;
      var user_type=$('#register-usertype').val();
      
      if ( (passwordlength == 0 && passwordlength2 == 0) || (passwordlength >= 6 && passwordlength2 == 0) || (passwordlength2 >= 6 && passwordlength == 0)){
        $("#warning").text("");
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
      if ( !validateEmail(email) && email != "" ) {
        $("#loginemail-warning").css('display', 'block');
        $("#loginemail-warning").text('پست الکترونیک معتبر نیست.');
      }
      else{
        $("#loginemail-warning").css('display', 'none');
        $("#loginemail-warning").text('');
      }

      if( email == "" || !validateEmail(email) || password == "" || password2 == "" || user_type == 0 || $("#warning").css('display') == "block" || $("#warning2").css('display') == "block"){
        $("#register-btn").attr('disabled', 'true');
      }
      else{
        $("#register-btn").removeAttr('disabled');
      }

    }, 1000);
    

    $('#forgot-email').delayinput(function()
    { 
      var email=$("#forgot-email").val();
      console.log(email);

      if( !validateEmail(email) && email != ""){
        $("#forgot-btn").attr('disabled', 'true');
        $("#warning-forgot").css('display', 'block');
        $("#warning-forgot").text('پست الکترونیک معتبر نیست.');
      }
      else{
        $("#forgot-btn").removeAttr('disabled');
        $("#warning-forgot").css('display', 'none');
        $("#warning-forgot").text('');
      }

    }, 1000);

});
