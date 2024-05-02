// To add Discipline
function addDiscipline() {
    $.post(WEBROOT + "discipline/add", function (data) {
        loadModal(data);
    });
}

// To Insert Discipline
function insertDiscipline() {
    var params = $('#add_discipline').serializeArray();
    $.post(WEBROOT + "discipline/create", params, function (data) {
        loadModal(data);
        disciplineBody(10, 1, 'name', 'asc');
    });
}

// To Edit Discipline
function editDiscipline(id) {
    $.get(WEBROOT + 'discipline/edit', {'id': id}, function (data) {
        loadModal(data);
    });
}

// To Update Discipline
function updateDiscipline() {
    var params = $('#edit_discipline').serializeArray();
    $.post(WEBROOT + 'discipline/update', params, function (data) {
        loadModal(data);
        disciplineBody(10, 1, 'name', 'asc');
    });
}

// To Delete Discipline
function deleteDiscipline(id) {
    if (confirm("Are you sure you want to delete this Discipline record?")) {
        $.post(WEBROOT + 'discipline/delete', {'id': id}, function (data) {
            loadModal(data);
            disciplineBody(10, 1, 'name', 'asc');
        });
    }
}

// To Discipline Body page 
function disciplineBody(rows, pageno, sort_by, sort_order) {
    var params = {
        'rows': rows,
        'pageno': pageno,
        'sort_by': sort_by,
        'sort_order': sort_order,
        'keywords': $('#keywords').val(),
        'status': $('#status').val(),
    };
    $.post(WEBROOT + "discipline/indexBody", params, function (data) {
        $('#discipline_body').html(data);
    });
}

// To Reset Discipline Body
function resetDisciplineBody() {
    $('#keywords').val('');
    $('#status').val('');
    disciplineBody(10, 1, 'name', 'asc');
}