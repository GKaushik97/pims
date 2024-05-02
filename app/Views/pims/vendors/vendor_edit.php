<?php
/**
 * Edit Vendor
 */
$id_val = isset($vendor['id']) ? $vendor['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$name_val = isset($vendor['name']) ? $vendor['name'] : set_value('name');
$contact_name_val = isset($vendor['contact_name']) ? $vendor['contact_name'] : set_value('contact_name');
$contact_email_val = isset($vendor['contact_email']) ? $vendor['contact_email'] : set_value('contact_email');
$contact_phone_val = isset($vendor['contact_phone']) ? $vendor['contact_phone'] : set_value('contact_phone');
?>

<div class="modal-dialog">
	<div class="modal-content">
		<form method="post" id="edit_vendor" onsubmit="return false">
			<?= csrf_field(); ?>
			<input type="hidden" name="id" value="<?= $id_val; ?>">
			<div class="modal-header">
				<h5 class="modal-title fs-5">Edit Vendor</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<label for="name" class="col-sm-3 col-form-label text-end">Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= $name_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div>
                <div class="row">
					<label for="contact_name" class="col-sm-3 col-form-label text-end">contact_name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="contact_name" id="contact_name" value="<?= $contact_name_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('contact_name') ?></small></span>
                    </div>
                </div>
                <div class="row">
					<label for="contact_email" class="col-sm-3 col-form-label text-end">contact_email&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="contact_email" id="contact_email" value="<?= $contact_email_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('contact_email') ?></small></span>
                    </div>
                </div>
                <div class="row">
					<label for="contact_phone" class="col-sm-3 col-form-label text-end">contact_phone&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="contact_phone" id="contact_email" value="<?= $contact_phone_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('contact_phone') ?></small></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            	<button type="submit" onclick="updateVendor()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
            	<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>

