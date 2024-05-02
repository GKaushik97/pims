<?php
/**
 * @package PIMS
 * Document Types Body View
 */

$keywords = isset($params['keywords']) ? htmlspecialchars($params['keywords']) : '';
$pageno = isset($params['pageno']) ? intval($params['pageno']) : 1;
$sort_by = isset($params['sort_by']) ? htmlspecialchars($params['sort_by']) : 'status';
$sort_order = (isset($params['sort_order']) AND $params['sort_order'] == 'asc') ? 'asc' : 'desc';
$sort_order_alt = (isset($params['sort_order']) AND $params['sort_order'] == 'asc') ? 'desc' : 'asc';
$rows = isset($params['rows']) ? intval($params['rows']) : 50;
$tRecords = isset($params['tRecords']) ? intval($params['tRecords']) : 0;
$status = isset($_POST['status']) ? $_POST['status'] : '';

$total_pages = $rows > 0 ? ceil($tRecords / $rows) : 1;

$offset = ($pageno - 1) * $rows;
?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search Here...">
            </div>            
            <div class="col-auto">
                <select class="form-select form-select-sm" name="status_filter" id="status" onchange="documentTypeBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>',)">
                    <option value="">All Status</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="documentTypeBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetDocumentTypeBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <button class="btn btn-success btn-sm" onclick="addDocument_type()"><i class="bi bi-plus-square"></i>&nbsp;Add Document Type</button>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>
                    <a href="javascript:void(0)" onclick="documentTypeBody('<?= $rows; ?>','<?= $pageno; ?>','code','<?= $sort_order_alt; ?>')">Code
                        <?php if($sort_by =='code') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="documentTypeBody('<?= $rows; ?>','<?= $pageno; ?>','name','<?= $sort_order_alt; ?>')">Name
                        <?php if($sort_by =='name') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="documentTypeBody('<?= $rows; ?>','<?= $pageno; ?>','status','<?= $sort_order_alt; ?>')">Status
                        <?php if($sort_by =='status') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="documentTypeBody('<?= $rows; ?>','<?= $pageno; ?>','created_at','<?= $sort_order_alt; ?>')">Document date
                        <?php if($sort_by =='created_at') { echo ($sort_order == 'asc') ? '<i class=" bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>            
                <th width="15%">Actions</th>
            </tr>            
        </thead>
        <tbody>
            <?php
                $i =($pageno - 1) * $rows + 1;
                if(isset($doc_types) AND !empty($doc_types)) {
                    foreach ($doc_types as $doc_Value) {
            ?>
                <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td><?= $doc_Value['code']; ?></td> 
                    <td><?= $doc_Value['name']; ?></td>
                    <td>
                        <?php if ($doc_Value['status'] == '1') { ?>
                            <span class="status status-success bi bi-check"></span> Enable
                        <?php } else if ($doc_Value['status'] == '0') { ?>
                            <span class="status status-danger bi bi-x"></span> Disable
                        <?php } else { ?>
                            <span class="status status-warning bi bi-exclamation-triangle"></span> Extinction
                        <?php } ?>
                    </td>
                    <td><?= date('d-m-Y', strtotime($doc_Value['created_at'])); ?></td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="editDocumentType(<?= $doc_Value['id']; ?>)"><i class="bi bi-pencil-square"></i> Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteDocumentType(<?= $doc_Value['id']; ?>)"><i class="bi bi-trash"></i> Delete</button>
                    </td>
                </tr>
                <?}
                } else {?>
                <tr>
                    <td colspan="6"><div class="alert alert-warning"><i class="bi bi-info-circle"></i>&nbsp;No Records Found.</div></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>