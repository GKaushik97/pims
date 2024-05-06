// Document Body
function documentsBody(rows, pageno, sort_by, sort_order) {
	var params = {
		'rows' : rows,
		'page_no' : pageno,
		'sort_by' : sort_by,
		'sort_order' : sort_order,
		'keywords' : $('#keywords').val(),
	}
	$.post(WEBROOT + "documents/indexBody", params, function(data) {
		$('#documents_body').html(data);
	});
}
// To Reset Function
function resetDocumentsBody()
{
	$("#keywords").val("");
	documentsBody(10,1,'ed.created_at','desc');
}

// To Add Document
function addDocument(){
	$.post(WEBROOT + "documents/addDocument", function(data) {
		loadModal(data);
	});
}
// To Insert Document
function insertDocument()
{
	$.ajax({
		'url' : WEBROOT + "documents/createDocument",
		'type' : 'post',
		'data' : new FormData(document.forms['add_document']),
		'processData' : false,
		'contentType' : false,
		'cache' : false,
		success : function(data) {
			loadModal(data);
			resetDocumentsBody();
		}
	})
}

// To Edit Document
function editDocument(id) {
	$.get(WEBROOT+"documents/editDocument", {'id' : id}, function(data) {
		loadModal(data);
	});
}

// To Verify Document
function verifyDocument(id, type) {
	$.get(WEBROOT + "documents/verifyStatus", {'id' : id, 'type' : type}, function(data) {
		loadModal(data);
	});
}

function updateVerifyStatus(){
	var params = $('#verify_document').serializeArray();
	$.post(WEBROOT + "documents/updateVerifyStatus", params, function(data) {
		loadModal(data);
		resetDocumentsBody();
	});
}
// To Verify Document
function approveDocument(id, type) {
	$.get(WEBROOT + "documents/approveStatus", {'id' : id, 'type' : type}, function(data) {
		loadModal(data);
	});
}

function updateApproveStatus(){
	var params = $('#approve_document').serializeArray();
	$.post(WEBROOT + "documents/updateApproveStatus", params, function(data) {
		loadModal(data);
		resetDocumentsBody();
	});
}

// Add Revised Document
function addRevisedDocument(id) {
	$.get(WEBROOT + "documents/addRevisedDocument", {'id' : id}, function(data) {
		loadModal(data);
	});
}

// To update Revised Document
function updateRevisedDocument()
{
	$.ajax({
		url : WEBROOT + "documents/updateRevisedDocument",
		type : 'post',
		data : new FormData(document.forms['revised_document']),
		processData : false,
		contentType : false,
		cache : false,
		success: function(data) {
			loadModal(data);
			resetDocumentsBody();
		}
	})
}

// To View EDMS Document
function viewDocument(id) {
	$.get(WEBROOT + "documents/viewDocument", {'id' : id}, function(data) {
		loadModal(data);
	});
}

// To Delete Document
function deleteDocument(id) {
	if(confirm("Are you sure you want to delete the document.")) {
		$.post(WEBROOT + "documents/deleteDocument", {'id' : id}, function(data) {
			loadModal(data);
			resetDocumentsBody();
		});
	}
}