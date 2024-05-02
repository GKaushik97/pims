/**
 * client list
 */
// client body
function  clientBody(rows, pageno, sort_by, sort_order) {
	var params = {
		'rows' : rows,
		'pageno' : pageno,
		'sort_by' : sort_by,
		'sort_order' : sort_order,
		'keywords' : $('#keywords').val(),
	}
	$.post(WEBROOT+'client/clientBody', params, function(data) {
		$('#client_body').html(data);
	});
}
// To reset clientbody
function resetClientBody() {
	$('#keywords').val('');
	clientBody(20,1,'code','asc');
}
// To add client
function addClient() {
	$.post(WEBROOT+"client/add", function(data){
		loadModal(data);
	});
}
// To insert client
function insertClient() {
	
	var params = $('#add_client').serializeArray();
	$.post(WEBROOT+"client/create", params, function(data) {
		loadModal(data);
		clientBody(20,1,'code','asc');
	});
}
// To edit client
function editClient(id) {
	$.get(WEBROOT+"client/edit",{'id' : id}, function(data){
		loadModal(data);
	});
}
// To update client
function updateClient() {
	
	var params = $('#edit_client').serializeArray();
	$.post(WEBROOT+"client/update", params, function(data) {
		loadModal(data);
		clientBody(20,1,'code','asc');
	});
}
// To delete client
function deleteClient(id) {
	if (confirm('Are you sure, you want to delete this client ?')) {
		$.post(WEBROOT+"client/delete", {'id' : id}, function (data) {
			loadModal(data);
			clientBody(20,1,'code','asc');
		})
	}
}

