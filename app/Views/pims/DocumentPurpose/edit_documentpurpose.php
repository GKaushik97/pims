<?php

/**
 * edit documentpurpose
 */
$id_val = isset($document_purposes['id']) ? $document_purposes['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$name_val = isset($document_purposes['name']) ? $document_purposes['name'] : set_value('name');
$code_val = isset($document_purposes['code']) ? $document_purposes['code'] : set_value('code');
$status = isset($document_purposes['status']) ? $document_purposes['status'] : set_value('status');
?>
<div class="modal-dialog">
	<div class="modal-content">
		<form method="post" id="edit_documentpurpose" onsubmit="return false">
			<?= csrf_field(); ?>
			<input type="hidden" name="id" value="<?= $id_val; ?>">
			<div class="modal-header">
				<h5 class="modal-title fs-5">Edit DocumentPurpose</h5>
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
                    <label for="status" class="col-sm-3 col-form-label text-end">Document Status&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
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
                <button type="submit" onclick="updateDocument()" class="btn btn-success btn-sm"><i class="bi bi-check-square"></i>&nbsp;Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>
