<?php
$vendor_val = (isset($_POST['vendor']) and $_POST['vendor'] !== '') ? $_POST['vendor'] : set_value('vendor');
?>

<div class="row mb-3" id="vendor_data">
    <label class="col-sm-4 col-form-label text-end">Vendor&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
    <div class="col-sm-6">
        <select class="form-select form-select-sm" name="vendor" id="vendor">
            <option value="">Select</option>
            <?php
            if (isset($vendors) and !empty($vendors)) {
                foreach ($vendors as $vendor) { ?>
                    <option value="<?= $vendor['id']; ?>" <?php if ($vendor_val == $vendor['id']) { echo "selected"; } ?>><?= $vendor['name']; ?></option>
            <?php 
                }
            } ?>
        </select>
        <span class="text-danger"><small><?= validation_show_error('vendor') ?></small></span>
    </div>
</div>
