/**
 * Document Revisions List
 */
// To Add Document Revisions
function addDocumentRevision() {
    $.post(WEBROOT + "documentRevisions/add", function (data) {
        loadModal(data);
    });
}
// To Insert Document Revision
function insertDocumentRevision() {
    var params = $('#add_revision').serializeArray();
    $.post(WEBROOT + "documentRevisions/create", params, function (data) {
        loadModal(data);
        revisionBody(10, 1, 'position', 'asc');
    });
}

// To Edit Document Revision
function editDocumentRevision(id) {
    $.get(WEBROOT + 'documentRevisions/edit', {'id': id}, function (data) {
        loadModal(data);
        revisionBody(10, 1, 'position', 'asc');
    });
}
// To Update Document Revision
function updateDocumentRevision() {
    var params = $('#edit_revision').serializeArray();
    $.post(WEBROOT + 'documentRevisions/update',params,function(data){
        loadModal(data);
        revisionBody(10, 1, 'position', 'asc');
    });
}
// To Delete Document Revision
function deleteDocumentRevision(id) {
    if(confirm("Are you sure want to delete this record?")){
        $.post(WEBROOT + 'documentRevisions/delete',{'id':id},function(data){
            loadModal(data);
            revisionBody(10, 1, 'position', 'asc');
        });
    }
}
function revisionBody(rows, pageno, sort_by, sort_order) {
    var params = {
        'rows': rows,
        'pageno': pageno,
        'sort_by': sort_by,
        'sort_order': sort_order,
        'keywords': $('#keywords').val(),
        };
    $.post(WEBROOT + "documentRevisions/indexBody", params, function (data) {
        $('#documentRevisions_body').html(data);
    });
}
function resetrevisionBody() {
    $('#keywords').val(''),
    revisionBody(10, 1, 'position', 'asc');
}
function movePosition(id,position) {
    $.post(WEBROOT + 'documentRevisions/movePosition', {'id': id, 'position': position}, function (data) {
        revisionBody(10, 1, 'position', 'asc');
    });
}

