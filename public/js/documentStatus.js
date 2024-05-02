function documentStatusBody(rows, pageno, sort_by, sort_order) {
	preLoader();
	var qStr = {
		'rows' : rows,
		'pageno' : pageno,
		'sort_by' : sort_by,
		'sort_order' : sort_order,
		'int_keywords' : $('#int_keywords').val(),
		'cli_keywords' : $('#cli_keywords').val(),
		'cli_rows' : $('#cli_rows').val(),
		'cli_pageno' : $('#cli_pageno').val(),
		'cli_sort_by' : $('#cli_sort_by').val(),
		'cli_sort_order' : $('#cli_sort_order').val(),
	};

	$.post(WEBROOT+"documentStatus/documentStatusBody", qStr, function(data) {
		$('#document_status_body').html(data);
		closePreLoader();
	});
}

function resetDocumentStatusBody() {
	$('#int_keywords').val('');
	documentStatusBody(20,1,'created_at', 'desc');
}

function addIntDocumentStatus(type) {
	preLoader();
	$.post(WEBROOT+"documentStatus/addIntDocumentStatus",{'type' : type}, function (data) {
		closePreLoader();
		loadModal(data);
	});
}

function insertIntDocumentStaus() {
	preLoader();
	var params = $('#document_status_add_form').serializeArray();
	$.post(WEBROOT+"documentStatus/createIntDocumentStatus", params, function (data) {
		loadModal(data);
		documentStatusBody(20,1,'created_at', 'desc');
		closePreLoader();
	});
}

function clientDocumentStatusBody(rows, pageno, sort_by, sort_order) {
	preLoader();
	var qStr = {
		'cli_rows' : rows,
		'cli_pageno' : pageno,
		'cli_sort_by' : sort_by,
		'cli_sort_order' : sort_order,
		'int_keywords' : $('#int_keywords').val(),
		'cli_keywords' : $('#cli_keywords').val(),
		'rows' : $('#rows').val(),
		'pageno' : $('#pageno').val(),
		'sort_by' : $('#sort_by').val(),
		'sort_order' : $('#sort_order').val(),
	};

	$.post(WEBROOT+"documentStatus/documentStatusBody", qStr, function(data) {
		$('#document_status_body').html(data);
		closePreLoader();
	});
}

function resetClientDocumentStatusBody() {
	$('#cli_keywords').val('');
	clientDocumentStatusBody(20,1,'created_at', 'desc');
}

function editDocumentStatus(id) {
	preLoader();
	$.post(WEBROOT+"documentStatus/editDocumentStatus", {'id' : id}, function (data) {
		loadModal(data);
		closePreLoader();
	});
}
function updateIntDocumentStaus() {
	preLoader();
	var params = $('#document_status_edit_form').serializeArray();
	$.post(WEBROOT+"documentStatus/updateDocumentStatus", params, function (data) {
		loadModal(data);
		documentStatusBody(20,1,'created_at', 'desc');
		closePreLoader();
	});
}

function deleteDocumentStatus(id) {
	preLoader();
	if(confirm('Are you sure, you want to delete this document status ?'))
	{
		$.post(WEBROOT+"documentStatus/deleteDocumentStatus", {'id' : id}, function (data) {
			loadModal(data);
			documentStatusBody(20,1,'created_at', 'desc');
			closePreLoader();
		});
	}
}