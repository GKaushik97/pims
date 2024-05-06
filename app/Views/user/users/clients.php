<?
$client_val = (isset($_POST['client']) and $_POST['client'] !== '') ? $_POST['client'] : set_value('client');
?>
<div class="row mb-3" id="client_data">
    <label class="col-sm-4 col-form-label text-end">Client&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
    <div class="col-sm-6">
        <select class="form-select form-select-sm" name="client" id="client">
            <option value="">Select</option>
            <?php 
            if (isset($clients) and !empty($clients)) {
                foreach ($clients as $client) { ?>
                    <option value="<?= $client['id']; ?>" <?php if ($client_val == $client['id']) { echo "selected"; } ?>><?= $client['name']; ?></option>
                <?php
                }
             } ?>
        </select>
        <span class="text-danger"><small><?= validation_show_error('client') ?></small></span>
    </div>
</div>