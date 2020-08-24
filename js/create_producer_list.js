function create_producer_list($id, $first_name, $last_name, $image, $province, $city, $company_name,$type) {
    
    if ($type % 2 == 0) {
        $result =
            '<div class="panel panel-default col-xs-5 pull-right remove" style="margin-top:100px; height:500px;">' +
            '<div class="panel-heading">' +
            '<h3 class="text-center">' + $company_name + '</h3>' +
            '</div>' +
            '<div class="panel-body">' +
            '<div><img src="' + $image + '" style="width:200px; height:200px;"></div>'+
            '<div class="text-center" style="margin-top:20px;">' +
            '<p class="p-producer-show">نام: ' + $first_name + '</p>' +
            '<p class="p-producer-show">نام خانوادگی: ' + $last_name + '</p>' +
            '<p class="p-producer-show">استان: ' + $province + '</p>' +
            '<p class="p-producer-show">شهر: ' + $city + '</p> </div>' +
            '<a class="btn btn-primary item_show" id="' + $id + '" href="producer_item.php?id=' + $id + '">مشاهده اجناس</a>'+
            '</div></div>';
    }
    else{
        $result =
            '<div class="panel panel-default col-xs-5 remove" style="margin-top:100px; height:500px;">' +
            '<div class="panel-heading">' +
            '<h3 class="text-center">' + $company_name + '</h3>' +
            '</div>' +
            '<div class="panel-body">' +
            '<div><img src="' + $image + '" style="width:200px; height:200px;"></div>'+
            '<div class="text-center" style="margin-top:20px;">' +
            '<p class="p-producer-show">نام: ' + $first_name + '</p>' +
            '<p class="p-producer-show">نام خانوادگی: ' + $last_name + '</p>' +
            '<p class="p-producer-show">استان: ' + $province + '</p>' +
            '<p class="p-producer-show">شهر: ' + $city + '</p></div>'+
            '<a class="btn btn-primary item_show" id="' + $id + '" href="producer_item.php?id=' + $id + '">مشاهده اجناس</a>'+
            '</div></div>';
    }
     
    return $result;
}
