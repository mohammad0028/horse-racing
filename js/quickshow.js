function create_quickshow($item_id, $name, $image_num, $total, $sail_num, $off, $price, $description,$email, $no) {
    $no = $no || 0;
    
    $result =
        '<div class="panel panel-default" style="width:100%; height:20%; margin-right:auto; margin-left:auto; margin-top:20px;">' +
        '<div class="panel-heading">' +
        '<h3 class="text-center">' + $name + '</h3>' +
        '</div>' +
        '<div class="panel-body">' +
        '<div id="' + $no +  $item_id + '" class="carousel slide" data-ride="carousel">' +
        '<ol class="carousel-indicators">' +
        '<li data-target="#' + $no + $item_id + '" data-slide-to="0" class="active"></li>';
    for ($j = 1; $j < $image_num; $j++)
        $result += '<li data-target="#' + $no + $item_id + '" data-slide-to="' + $j + '"></li>';

    $result += '</ol>' +
        '<div class="carousel-inner" role ="listbox" style="width:50%; margin:auto;">' +
        '<div class="item active">' +
        '<img style="width:80%;" src="upload/item/' + $email + '/' + $item_id + '/0.jpg" alt`="Chania">' +
        '</div>';

    for ($j = 1; $j < $image_num; $j++) {
        $result +=
            '<div class="item">' +
            '<img style="width:80%;" src="upload/item/' + $email + '/' + $item_id + '/' + $j + '.jpg" alt="Chania">' +
            '</div>';
    }
    $result +=
        '</div>' +
        '<a class="left carousel-control" href ="#' + $no + $item_id + '"role ="button" data-slide="prev">' +
        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>' +
        '<span class="sr-only"> Previous </span>' +
        '</a>' +
        '<a class="right carousel-control" href="#' + $no + $item_id + '" role="button" data-slide ="next">' +
        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>' +
        '<span class="sr-only">Next</span></a>' +
        '</div>' +

        '<div class="col-xs-12 text-center" style="margin-top:20px;">' +
        '<p class="p-item-show">موجودی انبار: ' + $total + '</p>' +
        '<p class="p-item-show">میزان فروش: ' + $sail_num + '</p>' +
        '<p class="p-item-show">تخفیف: ' + $off + '</p>' +
        '<p class="p-item-show">قیمت: ' + $price + '</p>' +
        '<p class="p-item-show">توضیحات: ' + $description + ' </p>' +
        '</div>';
        if ($no != 0) {
            $result+=
            '<label for="item-count-' + $no + '-' + $item_id + '">تعداد کالا : <input class="form-control item_count" style="width:35%; direction:ltr; display:inline" type="number" id="item-count-' + $no + '-' + $item_id + '" min=1 value="1"></label>'+
            '<div id="warning-' + $no + '-' + $item_id + '" style="color:red; display:none;">لطفا تعداد کالا را درست وارد کنید</div>'+
            '<div id="success-' + $no + '-' + $item_id + '" style="color:red; display:none;">به سبد خرید اضافه شد</div>'+
            '<button id="buy-' + $no + '-' + $item_id + '" class="btn btn-success buy" style="display:block;margin:auto; margin-top:20px; margin-bottom:15px;"><span class="glyphicon glyphicon-shopping-cart btn-sm"></span> افزودن به سبد خرید</button>';
        }
        $result+=
        '<button class="btn btn-primary show_comment" id="' + $no + '-' + $item_id + '"><span class="glyphicon glyphicon-comment btn-xs"></span> مشاهده نظرات</button>'+
        '<div class="col-xs-12" id="comment-' + $no + $item_id + '" style="border:1px solid; border-color:rgba(0, 0, 0, 0.2); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:15px; display:none; border-radius:5px;">'+
        '<h3 class="text-right" style="font-weight:bold; margin-right:5px; font-size:22px;">نظرات</h3><hr style="color:#E3F2FD; border:2px solid">'+
        '<textarea id="text-' + $no + '-' + $item_id + '" placeholder="نظر شما ..." class="form-control" style="width:90%; margin:auto; resize:vertical; overflow:auto;"></textarea>'+
        '<div class="text-left" style="margin-left:5%;" id="div-' + $no + '-' + $item_id + '"><button class="btn btn-primary send" style="margin-top:15px; margin-bottom:10px;" id="send-' + $no + '-' + $item_id + '">ارسال نظر</button></div>'+
        '</div>'+
        '<button id="btn-' + $no + '-'+ $item_id + '" class="btn btn-primary btn-block load-more-comment" style="display:none; margin-top:20px;">مشاهده نظرات بیشتر</button>'+
        '</div></div>';
    return $result;
}
