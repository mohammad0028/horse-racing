function create_transaction_table(count,company_name,buy_id,total_price) {
	
	var result=
	'<tr class="remove" id="tr-' + count + '">'+
	'<td>' + count + '</td>'+
	'<td id="company_name-' + count + '">' + company_name + '</td>'+
	'<td id="buy_id-' + count + '">' + buy_id + '</td>'+
	'<td id="total_price-' + count + '">' + total_price + '</td>'+
	'<td>'+
	'<a title="مشاهده بیشتر" class="show_more" id="' + count + '" style="cursor:pointer"><i class="fa fa-mail-reply"></i></a>'+
	'</td>'+
	'</tr>';

	return result;
}
