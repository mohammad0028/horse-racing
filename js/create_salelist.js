function create_salelist(item_name , item_count , item_price , item_off, company_name){

	var total_off= (item_price * item_off / 100 ) * item_count;
	var price= item_count * item_price - total_off;

	var result=
	'<table style="width:100%;">'+
	'<tr style="border-bottom-style:hidden;"><td><p>نام فروشگاه خرده فروش : </p></td><td><p>' + company_name + '</p></td></tr>'+
	'<tr style="border-bottom-style:hidden;"><td><p>نام کالا : </p></td><td><p>' + item_name + '</p></td></tr>'+
	'<tr style="border-bottom-style:hidden;"><td><p>تعداد کالا : </p></td><td><p>' + item_count + '</p></td></tr>'+
	'<tr style="border-bottom-style:hidden;"><td><p>قیمت کالا : </p></td><td><p>' + item_price + '</p></td></tr>'+
	'<tr style="border-bottom-style:hidden;"><td><p>تخفیف : </p></td><td><p>' + item_off + '</p></td></tr>'+
	'<tr><td><p>قیمت کل : </p></td><td><p>' + price + '</p></td></tr>'+
	'</table>'+
	'<hr style="border-bottom:2px solid">';

	return result;
}