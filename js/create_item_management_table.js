function create_item_management_table(item_id,count,name,total,price,off,description) {
	
	var result=
	'<tr class="remove">'+
	'<td>' + count + '</td>'+
	'<td>' + name + '</td>'+
	'<td>' + total + '</td>'+
	'<td>' + price + '</td>'+
	'<td class="hidden-xs">' + off + '</td>'+
	'<td class="hidden-xs">' + description + '</td>'+
	'<td>'+
	'<a title="حذف کالا" data-toggle="tooltip" data-placement="right" href="item-delete.php?id=' + item_id + '"><span class="glyphicon glyphicon-remove-sign"></span></a>'+
	'<a href="ItemRegistration.php?edititemid=' + item_id + '" title="ویرایش کالا" data-toggle="tooltip" data-placement="left"><i class="glyphicon glyphicon-edit"></i></a>'+
	'</td>'+
	'</tr>';

	return result;
}
