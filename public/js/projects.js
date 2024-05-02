/**
 * Projects List
 */
// To Add Project
function addProject() {
    $.post(WEBROOT + "projects/add", function (data) {
        loadModal(data);
    });
}
// To Insert Project
function insertProject() {
    var params = $('#add_project').serializeArray();
    $.post(WEBROOT + "projects/create", params, function (data) {
        loadModal(data);
        projectBody(10, 1, 'code', 'asc');
    });
}
// To Edit Project
function editProject(id) {
    $.get(WEBROOT + 'projects/edit', {'id': id}, function (data) {
        loadModal(data);
        projectBody(10, 1, 'code', 'asc');
    });
}
// To Update Project
function updateProject() {
    var params = $('#edit_project').serializeArray();
    $.post(WEBROOT + 'projects/update',params,function(data){
        loadModal(data);
        projectBody(10, 1, 'code', 'asc');
    });
}
// To Delete Project
function deleteProject(id) {
    if(confirm("Are you sure want to delete this record?")){
        $.post(WEBROOT + 'projects/delete',{'id':id},function(data){
            loadModal(data);
            projectBody(10, 1, 'code', 'asc');
        });
    }
}
function projectBody(rows, pageno, sort_by, sort_order) {
    var params = {
        'rows': rows,
        'pageno': pageno,
        'sort_by': sort_by,
        'sort_order': sort_order,
        'keywords': $('#keywords').val(),
        'name': $('#name_val').val(),
        'code': $('#code_val').val(),
        'client_id': $('#client_id_val').val(),
        'vendor_id': $('#vendor_id_val').val(),
        'pmc': $('#pmc_val').val(),
        'epc': $('#epc_val').val(),
        };
    $.post(WEBROOT + "projects/indexBody", params, function (data) {
        $('#projects_body').html(data);
    });
}
function resetProjectBody() {
    $('#keywords').val(''),
    $('#name_val').val(''),
    $('#code_val').val(''),
    $('#manager_val').val(''),
    $('#client_id_val').val(''),
    $('#vendor_id_val').val(''),
    $('#start_date_val').val(''),
    $('#end_date_val').val(''),
    projectBody(10, 1, 'code', 'asc');
}