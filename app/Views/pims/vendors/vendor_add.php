<?php
/**
 * Add Vendor
 */
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="add_vendor" onsubmit="return false">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title fs-5">Add Vendor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label for="name" class="col-sm-3 col-form-label text-end">Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= set_value('name'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div>  
                <div class="row">
                    <label for="contact_name" class="col-sm-3 col-form-label text-end">contact_name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="contact_name" id="contact_name" value="<?= set_value('contact_name'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('contact_name') ?></small></span>
                    </div>
                </div>
                <div class="row">
                    <label for="contact_email" class="col-sm-3 col-form-label text-end">contact_email&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="contact_email" id="contact_email" value="<?= set_value('contact_email'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('contact_email') ?></small></span>
                    </div>
                </div>
                <div class="row">
                    <label for="contact_phone" class="col-sm-3 col-form-label text-end">contact_phone&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="contact_phone" id="contact_phone" value="<?= set_value('contact_phone'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('contact_phone') ?></small></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="insertVendor()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>