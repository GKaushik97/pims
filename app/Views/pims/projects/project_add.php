<?php
/**
 *  To Add Project Details
 */
?>
<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" id="add_project" onsubmit="return false">
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title fs-5">Add Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <label for="name" class="col-sm-4 col-form-label text-end">Name&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= set_value('name'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('name') ?></small></span>
                    </div>
                </div> 
                <div class="row mb-1">
                    <label for="manager" class="col-sm-4 col-form-label text-end">Manager&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="manager" id="manager" value="<?= set_value('manager'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('manager') ?></small></span>
                    </div>
                </div>   
                <div class="row mb-1">
                    <label for="client_id" class="col-sm-4 col-form-label text-end">Client&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <select class="form-select form-select-sm" name="client_id">
                            <option value="">Select Client</option>
                            <?php foreach ($clients as $client) : ?>
                                <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger"><small><?= validation_show_error('client_id') ?></small></span>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="vendor_id" class="col-sm-4 col-form-label text-end">Vendor&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <select class="form-select form-select-sm" name="vendor_id">
                            <option value="">Select Vendor</option>
                            <?php foreach ($vendors as $vendor) : ?>
                                <option value="<?= $vendor['id'] ?>"><?= $vendor['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger"><small><?= validation_show_error('vendor_id') ?></small></span>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="pmc" class="col-sm-4 col-form-label text-end">Pmc&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="pmc" id="pmc" value="<?= set_value('pmc'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('pmc') ?></small></span>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="epc" class="col-sm-4 col-form-label text-end">Epc&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="epc" id="epc" value="<?= set_value('epc'); ?>">
                        <span class="text-danger"><small><?= validation_show_error('epc') ?></small></span>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="description" class="col-sm-4 col-form-label text-end">Description&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <textarea type="text" class="form-control form-control-sm" name="description" id="description" value="<?= set_value('description'); ?>" placeholder ="Enter Description"></textarea>
                        <span class="text-danger"><small><?= validation_show_error('description') ?></small></span>
                    </div>
                </div>
                <div class="row mb-1">
                    <label for="start_date" class="col-sm-4 col-form-label text-end">Start Date&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="start_date" name="start_date" autocomplete="off" placeholder="DD-MM-YYYY" value="<?= set_value('start_date') ?>" aria-label="start_date">
                            <span class="input-group-text"><span class="bi bi-calendar4-week"></span></span>
                        </div>
                        <small class="text-danger"><?= validation_show_error('start_date'); ?></small>
                    </div>
                </div> 
                <div class="row mb-1">
                    <label for="end_date" class="col-sm-4 col-form-label text-end">End Date&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                    <div class="col-sm-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" id="end_date" name="end_date" autocomplete="off" placeholder="DD-MM-YYYY" value="<?= set_value('end_date') ?>" aria-label="end_date">
                            <span class="input-group-text"><span class="bi bi-calendar4-week"></span></span>
                        </div>
                        <small class="text-danger"><?= validation_show_error('end_date'); ?></small>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" onclick="insertProject()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        // Initialize datepicker for "Start Date" field
        $('#start_date').datepicker({
            format: 'dd-mm-yyyy',
            endDate: 'today', 
            autoHide: true,
        });
    
        // Initialize datepicker for "End Date" field
        $('#end_date').datepicker({
            format: 'dd-mm-yyyy',
            autoHide: true,
        });
    
    
    });
</script>
