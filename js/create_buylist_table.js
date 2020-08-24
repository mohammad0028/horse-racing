function create_buylist_table(id,count,company_name,buy_id,total_price) {
	
	var result=
	'<tr class="remove">'+
	'<td>' + count + '</td>'+
	'<td id="company_name-' + id + '">' + company_name + '</td>'+
	'<td id="buy_id-' + id + '">' + buy_id + '</td>'+
	'<td id="total_price-' + id + '">' + total_price + '</td>'+
	'<td>'+
	'<a style="cursor:pointer;" title="مشاهده بیشتر" data-toggle="tooltip" data-placement="left" class="show_detaile"  id="show_detaile-' + id + '">'+
	'<i class="fa fa-mail-reply"></i>'+
	'</a>'+
	'</td>'+
	'</tr>';

	return result;
}
