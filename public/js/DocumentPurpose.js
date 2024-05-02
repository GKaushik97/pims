/**
 * Documentpurposes list
 */
// documentbody 
function documentBody(rows, pageno,sort_by,sort_order) {
	var params = {
		'rows' : rows,
		'pageno' : pageno,
		'sort_by' : sort_by,
		'sort_order' : sort_order,
		'keywords' : $('#keywords').val(),
		'status' : $('#status').val(),
	};
	$.post(WEBROOT + 'documentPurposes/DocumentBody',params,function (data) {
		$('#document_body').html(data);
	});
}
// To reset documentbody
function resetdocumentBody() {
	$('#keywords').val('');
	$('#status').val('');
	documentBody(10,1,'code','asc');
}
// add documentbody
function addDocumentPurpose() {
	$.post(WEBROOT+'documentPurposes/add',function (data) {
		loadModal(data);
		
		
	});

}
// insert documentbody
function insertDocumentPurpose() {
	var params = $('#add_documentpurpose').serializeArray();
	$.post(WEBROOT+'documentPurposes/create',params,function (data) {
		loadModal(data);
		documentBody(10,1,'code','asc');
	});

}
// edit documentbody
function editDocument(id) {
	$.get(WEBROOT+'documentPurposes/edit',{'id' : id},function (data) {
		loadModal(data);
	});
}
//update documentbody
function updateDocument() {
	var params = $('#edit_documentpurpose').serializeArray();
	$.post(WEBROOT+'documentPurposes/update',params,function (data) {
		loadModal(data);
		documentBody(10,1,'code','asc');
	});
}
//delete documentbody
function deleteDocument(id) {
	if (confirm('Are you sure, you want to delete this document ?')) {
		$.post(WEBROOT+"documentPurposes/delete", {'id' : id}, function (data) {
			loadModal(data);
			documentBody(10,1,'code','asc');
		})
	}
}
