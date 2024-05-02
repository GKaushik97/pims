<?php
/**
 * To Update the Project Details
 */
$id_val = isset($project['id']) ? $project['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
$code_val = isset($project['code']) ? $project['code'] : set_value('code');
$name_val = isset($project['name']) ? $project['name'] : set_value('name');
$client_id_val = isset($project['client_id']) ? $project['client_id'] : set_value('client_id');
$vendor_id_val = isset($project['vendor_id']) ? $project['vendor_id'] : set_value('vendor_id');
$pmc_val = isset($project['pmc']) ? $project['pmc'] : set_value('pmc');
$epc_val = isset($project['epc']) ? $project['epc'] : set_value('epc');
$start_date_val = isset($project['start_date']) ? $project['start_date'] : set_value('start_date');
$end_date_val = isset($project['end_date']) ? $project['end_date'] : set_value('end_date');
$manager_val = isset($project['manager']) ? $project['manager'] : set_value('manager');
$description_val = isset($project['description']) ? $project['description'] : set_value('description');
?>

<div class="modal-dialog">
    <div class="modal-content">
        <form method="post" onsubmit="return false" id="edit_project" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id_val ?>" />
            <?= csrf_field(); ?>
            <div class="modal-header">
                <h5 class="modal-title">Edit Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Project details fields -->
                <!-- Name -->
                <div class="row mb-1">
                    <label for="name" class="col-sm-4 col-form-label text-end">Name&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="name" id="name" value="<?= $name_val; ?>" placeholder="Please Enter Name">
                        <span class="text-danger"><small><?= validation_show_error('name'); ?></small></span>
                    </div>
                </div>
                <!-- Manager -->
                <div class="row mb-1">
                    <label for="manager" class="col-sm-4 col-form-label text-end">Manager&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="manager" id="manager" value="<?= $manager_val; ?>" placeholder="Please Enter Manager">
                        <span class="text-danger"><small><?= validation_show_error('manager'); ?></small></span>
                    </div>
                </div>
            </div>
                <!-- Client ID -->
                <div class="row mb-1">
                    <label for="client_id" class="col-sm-4 col-form-label text-end">Client ID&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <select class="form-select form-select-sm" name="client_id" id="client_id">
                            <option value="">Select Client</option>
                            <?php foreach ($clients as $client) : ?>
                                <option value="<?= $client['id'] ?>" <?php if ($client_id_val == $client['id']) echo 'selected'; ?>><?= $client['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger"><small><?= validation_show_error('client_id'); ?></small></span>
                    </div>
                </div>
                <div class="row mb-1">
                    <!-- Vendor ID -->
                    <label for="vendor_id" class="col-sm-4 col-form-label text-end">Vendor ID&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <select class="form-select form-select-sm" name="vendor_id" id="vendor_id">
                            <option value="">Select Vendor</option>
                            <?php foreach ($vendors as $vendor) : ?>
                                <option value="<?= $vendor['id'] ?>" <?php if ($vendor_id_val == $vendor['id']) echo 'selected'; ?>><?= $vendor['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text-danger"><small><?= validation_show_error('vendor_id'); ?></small></span>
                    </div>
                </div>
                <!-- PMC -->
                <div class="row mb-1">
                    <label for="pmc" class="col-sm-4 col-form-label text-end">PMC&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="pmc" id="pmc" value="<?= $pmc_val; ?>" placeholder="Please Enter PMC">
                        <span class="text-danger"><small><?= validation_show_error('pmc'); ?></small></span>
                    </div>
                </div>
                <!-- EPC -->
                <div class="row mb-1">
                    <label for="epc" class="col-sm-4 col-form-label text-end">EPC&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" name="epc" id="epc" value="<?= $epc_val; ?>" placeholder="Please Enter EPC">
                        <span class="text-danger"><small><?= validation_show_error('epc'); ?></small></span>
                    </div>
                </div>
                <!-- Description -->
                <div class="row mb-1">
                    <label for="description" class="col-sm-4 col-form-label text-end">Description&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <textarea rows="3" class="form-control form-control-sm" name="description" id="description" placeholder="Please Enter Description"><?= $description_val; ?></textarea>
                        <span class="text-danger"><small><?= validation_show_error('description'); ?></small></span>
                    </div>
                </div>
                <!-- Start Date -->
                <div class="row mb-1">
                    <label for="start_date" class="col-sm-4 col-form-label text-end">Start Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" name="start_date" id="start_date" value="<?= $start_date_val; ?>" placeholder="Please Enter Start Date">
                            <span class="input-group-text"><span class="bi bi-calendar4-week"></span></span>
                        </div>
                        <span class="text-danger"><small><?= validation_show_error('start_date'); ?></small></span>
                    </div>
                </div>
                <!-- End Date -->
                <div class="row mb-1">
                    <label for="end_date" class="col-sm-4 col-form-label text-end">End Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                    <div class="col-sm-7">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm" name="end_date" id="end_date" value="<?= $end_date_val; ?>" placeholder="Please Enter End Date">
                            <span class="input-group-text"><span class="bi bi-calendar4-week"></span></span>
                        </div>
                        <span class="text-danger"><small><?= validation_show_error('end_date'); ?></small></span>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" onclick="updateProject()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Update Project</button>
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