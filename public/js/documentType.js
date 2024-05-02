// To add Document Type
function addDocument_type() {
    $.post(WEBROOT + "documentType/add", function (data) {
        loadModal(data);
    });
}

// To Insert Document Type
function insertdocumentType() {
    var params = $('#add_documentType').serializeArray();
    $.post(WEBROOT + "documentType/create", params, function (data) {
        loadModal(data);
        documentTypeBody(10, 1, 'name', 'asc');
    });
}

// To Edit Document Type
function editDocumentType(id) {
    $.get(WEBROOT + 'documentType/edit', {'id': id}, function (data) {
        loadModal(data);
    });
}

// To Update Document Type
function updateDocumentType() {
    var params = $('#edit_documentType').serializeArray();
    $.post(WEBROOT + 'documentType/update', params, function (data) {
        loadModal(data);
        documentTypeBody(10, 1, 'name', 'asc');
    });
}

// To Delete Document Type
function deleteDocumentType(id) {
    if (confirm("Are you sure you want to delete this Document Type record?")) {
        $.post(WEBROOT + 'documentType/delete', {'id': id}, function (data) {
            loadModal(data);
            documentTypeBody(10, 1, 'name', 'asc');
        });
    }
}

// To Document Type Body page 
function documentTypeBody(rows, pageno, sort_by, sort_order) {
    var params = {
        'rows': rows,
        'pageno': pageno,
        'sort_by': sort_by,
        'sort_order': sort_order,
        'keywords': $('#keywords').val(),
        'status': $('#status').val(),
    };
    $.post(WEBROOT + "documentType/indexBody", params, function (data) {
        $('#document_type_body').html(data);
    });
}

// To Reset Document Type Body
function resetDocumentTypeBody() {
    $('#keywords').val('');
    $('#status').val('');
    documentTypeBody(10, 1, 'name', 'asc');
}