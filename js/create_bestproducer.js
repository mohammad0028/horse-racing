function create_bestproducer(first , second , third) {
    
    var result =
        '<div class="panel panel-default" style="margin-top:50px;">' +
        '<div class="panel-body">' +
        '<div id="carousel_best" class="carousel slide" data-ride="carousel">' +
        '<div class="carousel-inner" role ="listbox" style="width:500px; height:500px; margin:auto;">';
        if (first[6] == "") {
            first[6]="images/no-profile-img.jpg";
        }
        result +=
        '<div class="item active">' +
        '<h3>تولید کننده اول</h3>'+
        '<img src="' + first[6] + '" alt`="نفر اول">' +
        '<p>نام : '+ first[1] +'</p>'+
        '<p>نام خانوادگی : '+ first[2] +'</p>'+
        '<p>نام تولیدی : '+ first[3] +'</p>'+
        '<p>استان : '+ first[4] +'</p>'+
        '<p>شهر : '+ first[5] +'</p>'+
        '</div>';
    if (second.length) {
        if (second[6] == "") {
            second[6]="images/no-profile-img.jpg";
        }
        result +=
        '<div class="item">' +
        '<h3>تولید کننده دوم</h3>'+
        '<img src="' + second[6] + '" alt="نفر دوم">' +
        '<p>نام : '+ second[1] +'</p>'+
        '<p>نام خانوادگی : '+ second[2] +'</p>'+
        '<p>نام تولیدی : '+ second[3] +'</p>'+
        '<p>استان : '+ second[4] +'</p>'+
        '<p>شهر : '+ second[5] +'</p>'+
        '</div>';
    }
    
    if (third.length) {
        if (third[6] == "") {
            third[6]="images/no-profile-img.jpg";
        }
        result +=
        '<div class="item">' +
        '<h3>تولید کننده سوم</h3>'+
        '<img src="' + third[6] + '" alt="نفر شوم">' +
        '<p>نام : '+ third[1] +'</p>'+
        '<p>نام خانوادگی : '+ third[2] +'</p>'+
        '<p>نام تولیدی : '+ third[3] +'</p>'+
        '<p>استان : '+ third[4] +'</p>'+
        '<p>شهر : '+ third[5] +'</p>'+
        '</div>';
    }
    

    result +=
        '</div>' +
        '<a class="left carousel-control" href ="#carousel_best" role ="button" data-slide="prev">' +
        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>' +
        '<span class="sr-only"> Previous </span>' +
        '</a>' +
        '<a class="right carousel-control" href="#carousel_best" role="button" data-slide ="next">' +
        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>' +
        '<span class="sr-only">Next</span></a>' +
        '</div></div></div>';
    return result;
}
