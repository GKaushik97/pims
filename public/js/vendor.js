/**
 * Vendors List
 */
// To Add Vendor
function addVendor() {
    $.post(WEBROOT + "vendor/add", function (data) {
        loadModal(data);
    });
}

// To Insert Vendor
function insertVendor() {
    var params = $('#add_vendor').serializeArray();
    $.post(WEBROOT + "vendor/create", params, function (data) {
        loadModal(data);
        vendorBody(10, 1, 'code', 'asc');
    });
}

// To Edit Vendor
function editVendor(id) {
    $.get(WEBROOT + 'vendor/edit', {'id': id}, function (data) {
        loadModal(data);
    });
}

// To Update Vendor
function updateVendor() {
    var params = $('#edit_vendor').serializeArray();
    $.post(WEBROOT + 'vendor/update', params, function (data) {
        loadModal(data);
        vendorBody(10, 1, 'code', 'asc');
    });
}

// To Delete Vendor
function deleteVendor(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        $.post(WEBROOT + 'vendor/delete', {'id': id}, function (data) {
            loadModal(data);
            vendorBody(10, 1, 'code', 'asc');
        });
    }
}

function vendorBody(rows, pageno, sort_by, sort_order) {
    var params = {
        'rows': rows,
        'pageno': pageno,
        'sort_by': sort_by,
        'sort_order': sort_order,
        'keywords': $('#keywords').val(),
        'name': $('#name_val').val(),
        'code': $('#code_val').val(),
        'contact_name': $('#contact_name_val').val(),
        'contact_email': $('#contact_email_val').val(),
        'contact_phone': $('#contact_phone_val').val(),
        'status': $('#status_val').val(),
        };
    $.post(WEBROOT + "vendor/indexBody", params, function (data) {
        $('#vendor_body').html(data);
    });
}

// To Reset VendorBody
function resetVendorBody() {
    $('#keywords').val('');
    $('#name_val').val('');
    $('#code_val').val('');
    $('#contact_name_val').val(''); 
    $('#contact_email_val').val(''); 
    $('#contact_phone_val').val(''); 
    $('#status_val').val('');
    vendorBody(10, 1, 'code', 'asc');
}
