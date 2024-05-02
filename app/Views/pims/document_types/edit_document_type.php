<?php
/**
 * To Edit Document Type Form
 **/
$id_val = isset($discipline['id']) ? $discipline['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$code_val = isset($discipline['code']) ? $discipline['code'] : set_value('code');
$name_val = isset($discipline['name']) ? $discipline['name'] : set_value('name');
$status = isset($discipline['status']) ? $discipline['status'] : set_value('status');
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="edit_documentType" onsubmit="return false">
            <?= csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $id_val; ?>">
            <div class="modal-header">
                <h5 class="modal-title fs-5">Edit Document Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="code" class="col-sm-3 col-form-label text-end">Code&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="code" id="code" value="<?= $code_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('code') ?></small></span>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="name" class="col-sm-3 col-form-label text-end">Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= $name_val; ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="status" class="col-sm-3 col-form-label text-end">Document Type Status&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="enable" name="status" value="1"<? if($status == "1"){ echo "checked";}?>>
                            <label class="form-check-label" for="enable">Enable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="disable" name="status" value="0"<? if($status == "0"){ echo "checked";}?>>
                            <label class="form-check-label" for="disable">Disable</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="updateDocumentType()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
