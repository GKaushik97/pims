<?php
/**
 * vendor_body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$tRecords = $tRecords;
$sort_order_alt = $sort_order == 'asc' ? 'desc' : 'asc';
$rows = isset($params['rows']) ? $params['rows'] : '';
$name_val = isset($_POST['name']) ? $_POST['name'] : '';
$code_val = isset($_POST['code']) ? $_POST['code'] : '';
$contact_name_val = isset($_POST['contact_name']) ? $_POST['contact_name'] : '';
$contact_email_val = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
$contact_phone_val = isset($_POST['contact_phone']) ? $_POST['contact_phone'] : '';
$status_val = isset($_POST['status']) ? $_POST['status'] : '';

?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetVendorBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <button class="btn btn-success btn-sm" onclick="addVendor()"><i class="bi bi-plus-square"></i>&nbsp;Add Vendor</button>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                
                <th>
                    <a href="javascript:void(0)" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', 'code', '<?= $sort_order_alt; ?>')"> Code
                            <?php if($sort_by == 'code') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                    <th>
                        <a href="javascript:void(0)" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', 'name', '<?= $sort_order_alt; ?>')"> Name
                            <?php if($sort_by == 'name') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                        </a>
                    </th>


                
                <th>
                    <a href="javascript:void(0)" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', 'contact_name', '<?= $sort_order_alt; ?>')"> Contact Name
                            <?php if($sort_by == 'contcat_name') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', 'contact_email', '<?= $sort_order_alt; ?>')"> Contact Email
                            <?php if($sort_by == 'contact_email') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', 'contact_phone', '<?= $sort_order_alt; ?>')"> Contact Phone
                            <?php if($sort_by == 'contact_phone') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', 'status', '<?= $sort_order_alt; ?>')"> Status
                            <?php if($sort_by == 'status') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>Actions</th>
            </tr>            
        </thead>
        <tbody>
            <tr>
                <td>
                    #
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="code" id="code_val" value="<?= $code_val; ?>" placeholder=" Code ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="name" id="name_val" value="<?= $name_val; ?>" placeholder=" Vendor Name ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="contact_name" id="contact_name_val" value="<?= $contact_name_val; ?>" placeholder=" Contact Name ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="contact_email" id="contact_email_val" value="<?= $contact_email_val; ?>" placeholder=" Contact Email ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="contact_phone" id="contact_phone_val" value="<?= $contact_phone_val; ?>" placeholder=" Contact Phone ">
                </td>
               <th>
                    <select name="status_filter" class="form-select form-select-sm" aria-label="Filter by Status" id="status_val">
                        <option value="">All</option>
                        <option value="1" <?= $status_val == '1' ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= $status_val == '0' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </th>

                <td>
                    <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="vendorBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i>
                    </button>

                    <button class="btn btn-sm btn-warning" onclick="resetVendorBody()"><i class="bi bi-arrow-clockwise"></i></button>
                </td>
            </tr>
        <?php
            $i = $params['rows'] * ($params['pageno'] - 1) + 1;
            foreach ($vendors as $vendor) :
        ?>
        <tr>
            <td class="text-center"><?= $i++; ?></td>
            <td><?= $vendor['code']; ?></td>
            <td><?= $vendor['name']; ?></td>
            <td><?= $vendor['contact_name']; ?></td>
            <td><?= $vendor['contact_email']; ?></td>
            <td><?= $vendor['contact_phone']; ?>
            <td>
                <?php if ($vendor['status'] == '1') { ?>
                    <span class="status status-success status-icon-check">Active</span>
                <?php } else if ($vendor['status'] == '0') { ?>
                    <span class="status status-danger status-icon-close">Inactive</span>
                <?php } else { ?>
                    <span class="status status-warning">Unknown</span>
                <?php } ?>
            </td>
            <td>
                <button class="btn btn-sm btn-primary" onclick="editVendor(<?= $vendor['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteVendor(<?= $vendor['id']; ?>)"><i class="bi bi-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($vendors)){?>
            <tr>
                <td colspan="3" class="bg bg-warning">No Records Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
