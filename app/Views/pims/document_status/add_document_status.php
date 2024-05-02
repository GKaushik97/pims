<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Document Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form name="document_status_add_form" id="document_status_add_form" onsubmit="return false" method="post">
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" name="type" id="type" value="<?= $type  ?>">
                <div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label text-end">Code&nbsp;<span class="text text-danger">*</span>:&nbsp;</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm" type="text" name="code" id="code" value="<?= set_value('code') ?>">
                            <span class="text-danger"><small><?= validation_show_error('code') ?></small></span>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label text-end">Name&nbsp;<span class="text text-danger">*</span>:&nbsp;</label>
                        <div class="col-sm-7">
                            <input class="form-control form-control-sm" type="text" name="name" id="name" value="<?= set_value('name') ?>">
                            <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm" onclick="insertIntDocumentStaus()"><i class="bi bi-plus-square">&nbsp;</i>Add</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square">&nbsp;</i>Close</button>
            </div>
        </form>
    </div>
</div>