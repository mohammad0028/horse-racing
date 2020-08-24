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


  var editid=$("#editid").val();
  var imagenum=$("#imagenum").val();
  
  if ( editid != "not-set" ){
    $("#item-register").removeProp('disabled');
  }

  if ( imagenum != "not-set" ) {
    $("#img-num").text(imagenum + "تصویر انتخاب شد.");
  }

  $("#item-name").delayinput(function(){
    var name=$("#item-name").val();
    var id=$("#editid").val();

    console.log(id);
    
    $.ajax({
      url: 'itemname_check_ajax.php',
      type: 'POST',
      data: 'name='+name + '&id='+id,
      success: function(data){
        var result=$.trim(data);
        console.log(result);
        if (result == "not-valid") {
          $("#name-warning").text("کالای دیگری با این نام موجود است.لطفا نام دیگری انتخاب کنید.");
          $("#name-warning").fadeIn();
          $("#item-register").attr('disabled', 'true');
        }
        else{
          $("#name-warning").text("");
          $("#name-warning").fadeOut();
          var price=$("#item-price").val();
          var num=document.getElementById('file').files.length;

          if (imagenum != "not-set") {
            if ( price != "" ) {
              $("#item-register").removeAttr('disabled');
            }
            else{
              $("#item-register").attr('disabled', 'true');
            }
          }
          else {
            if ( price != "" && num != 0 ) {
              $("#item-register").removeAttr('disabled');
            }
            else{
              $("#item-register").attr('disabled', 'true');
            }
          }

        }
      }
    });
  },1000);

  $("#item-price").delayinput(function(){

    var price=$("#item-price").val();

    if (price == "") {
      $("#price-warning").text("لطفا قیمت کالا را وارد کنید");
      $("#price-warning").fadeIn();
    }
    else{
      $("#price-warning").text("");
      $("#price-warning").fadeOut();
    }
  },1000);

  $("#item-name , #item-price").delayinput(function(){
    var price=$("#item-price").val();
    var num=document.getElementById('file').files.length;
    var name_warning=$("#name-warning").text();
    console.log(name_warning);

    if (imagenum != "not-set") {

      if ( name_warning == "" && price != "" ) {
        $("#item-register").removeAttr('disabled');
      }
      else{
        $("#item-register").attr('disabled', 'true');
      }

    }
    else{

      if ( name_warning == ""  && price != "" && num != 0 ) {
        $("#item-register").removeAttr('disabled');
      }
      else{
        $("#item-register").attr('disabled', 'true');
      }

    }
    
  },1000);

  $("#file").change(function(event) {
    imagenum=0;
    var price=$("#item-price").val();
    var num=document.getElementById('file').files.length;
    var name_warning=$("#name-warning").text();

    if ( name_warning == "" && price != "" && num != 0 ) {
      $("#item-register").removeAttr('disabled');
    }   
    else{
      $("#item-register").attr('disabled', 'true');
    }

  }); 

});