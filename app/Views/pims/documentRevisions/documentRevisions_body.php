<?php
/**
 * documentRevisions_body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order_alt = ($params['sort_order'] == 'asc') ? 'desc' : 'asc';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$rows = isset($params['rows']) ? $params['rows'] : '';
?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="revisionBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetrevisionBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <button class="btn btn-success btn-sm" onclick="addDocumentRevision()"><i class="bi bi-plus-square"></i>&nbsp;Add Document Revision</button>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>
                    <a href="javascript:void(0)" onclick="revisionBody('<?php echo $rows; ?>', '1', 'code', '<?php echo $sort_order_alt; ?>')">Code</a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="revisionBody('<?php echo $rows; ?>', '1', 'name', '<?php echo $sort_order_alt; ?>')">Name</a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="revisionBody('<?php echo $rows; ?>', '1', 'status', '<?php echo $sort_order_alt; ?>')">Status</a>
                </th>
                <th>Position</th>
                <th>Actions</th>
            </tr>            
        </thead>
        <tbody>
        <?php
        $i = 1;
        $totalRevisions = count($documentRevisions); // Get the total number of revisions
        foreach ($documentRevisions as $documentRevision) :
            if ($documentRevision['position'] == "1") {
                $doc_rev_dis = "disabled";
            } else {
                $doc_rev_dis = "";
            }
        ?>
        <tr>
            <td class="text-center"><?= $i++; ?></td>
            <td><?= $documentRevision['code']; ?></td>
            <td><?= $documentRevision['name']; ?></td>
            <td>
                <?php if ($documentRevision['status'] == '1') { ?>
                    <span class="status status-success status-icon-check">Active</span>
                <?php } else if ($documentRevision['status'] == '0') { ?>
                    <span class="status status-danger status-icon-close">Inactive</span>
                <?php } else { ?>
                    <span class="status status-warning">Unknown</span>
                <?php } ?>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-success <?= $doc_rev_dis; ?>" onclick="movePosition(<?= $documentRevision['id']; ?>, <?= $documentRevision['position'] - 1 ?>)"><i class="bi bi-arrow-up"></i></button>
                <?php 
                if ($documentRevision['position'] < $max['max_position']) { ?>
                    <!-- Check if this is not the last revision -->
                    <button type="button" class="btn btn-sm btn-success" onclick="movePosition(<?= $documentRevision['id']; ?>, <?= $documentRevision['position'] + 1 ?>)"><i class="bi bi-arrow-down"></i></button>
                <?php }else { ?>
                    <!-- If it's the last revision, disable the down arrow button -->
                    <button type="button" class="btn btn-sm btn-success disabled"><i class="bi bi-arrow-down"></i></button>
                <?php }?>
            </td>
            <td>
                <button class="btn btn-sm btn-primary" onclick="editDocumentRevision(<?= $documentRevision['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteDocumentRevision(<?= $documentRevision['id']; ?>)"><i class="bi bi-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>

        <?php if (empty($documentRevisions)){?>
            <tr>
                <td colspan="5" class="bg bg-warning">No Records Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
