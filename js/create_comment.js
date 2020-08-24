function create_comment($text, $date, $company_name) {
 
    $result ='<div style="background-color:#E3F2FD; margin:15px; border-radius:20px;"><span class="pull-right text-right" style="margin-top:5px; font-size:20px; font-weight:bold; width:25%; height:20%; margin-right:2%;">' + $company_name + '</span><span class="pull-left" style="margin-top:5px; width:25%; height:20%;">' + $date + '</span>'+
    '<br>'+
    '<p class="text-right" style="padding:20px;">' + $text + '</p>'+
    '</div>';
    return $result;

}
