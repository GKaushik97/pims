<?php
$id_val = (isset($id) and !empty($id))? $id : ((isset($params['id']) and !empty($params['id'])) ? $params['id'] : "");
$document_status_code = (isset($document_status['code']) and !empty($document_status['code'])) ? $document_status['code'] : set_value('code');
$document_status_name = (isset($document_status['name']) and !empty($document_status['name'])) ? $document_status['name'] : set_value('name');
$doc_status = (isset($document_status['status']) and $document_status['status'] != "") ? $document_status['status'] : 1;
?>
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Document Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form name="document_status_edit_form" id="document_status_edit_form" onsubmit="return false" method="post">
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="<?= $id  ?>">
                <div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label text-end">Code&nbsp;<span class="text text-danger">*</span>:&nbsp;</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm" type="text" name="code" id="code" value="<?= $document_status_code ?>">
                            <span class="text-danger"><small><?= validation_show_error('code') ?></small></span>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label text-end">Name&nbsp;<span class="text text-danger">*</span>:&nbsp;</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm" type="text" name="name" id="name" value="<?= $document_status_name ?>">
                            <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                        </div>
                    </div>
                    <div class="row mb-2">
                    <label for="status" class="col-sm-3 col-form-label text-end">Document-Status Status&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="enable" name="status" value="1" <?php if ($doc_status == 1) { print "checked"; }?>>
                            <label class="form-check-label" for="enable">Enable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" id="disable" name="status" value="0" <?php if ($doc_status == 0) { print "checked"; }?>>
                            <label class="form-check-label" for="disable">Disable</label>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" onclick="updateIntDocumentStaus()"><i class="bi bi-plus-square">&nbsp;</i>Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square">&nbsp;</i>Close</button>
            </div>
        </form>
    </div>
</div>