<?php
/**
 * vendor_body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['page_no']) ? $params['page_no'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$tRecords = $tRecords['trecords'];
$sort_order_alt = $sort_order == 'asc' ? 'desc' : 'asc';
$rows = isset($params['rows']) ? $params['rows'] : '';
$origin_val_ext = json_decode(ORIGIN, true);
$total_pages = $rows > 0 ? ceil($tRecords / $rows) : 1;
$client_val = CLIENT;
$internal_val = INTERNAL;
?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="documentsBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetDocumentsBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <button class="btn btn-success btn-sm" onclick="addDocument()"><i class="bi bi-plus-square"></i>&nbsp;Add Document</button>
            </div>
            <div class="col-auto">
                <select class="form-select form-select-sm" name="rows" id="rows" onchange="documentsBody(this.value, '<?= $pageno;?>','<?= $sort_by;?>','<?= $sort_order;?>')">
                    <option value="10" <?= $rows == 10 ? 'selected="selected"' : ''; ?>>10 Records</option>
                    <option value="20" <?= $rows == 20 ? 'selected="selected"' : ''; ?>>20 Records</option>
                    <option value="50" <?= $rows == 50 ? 'selected="selected"' : ''; ?>>50 Records</option>
                    <option value="100" <?= $rows == 100 ? 'selected="selected"' : ''; ?>>100 Records</option>
                </select>
            </div>
            <div class="col-auto">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm mb-0">
                        <?php if ($pageno == 1) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="documentsBody('<?= $rows; ?>','1','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-left"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="documentsBody('<?= $rows; ?>','<?= $pageno - 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-left"></i></a>
                            </li>
                        <?php } ?>
                            <li class="page-item active" aria-current="page">
                                <span class="page-link p-0 text-white inv-tracking-select">
                                    <select class="form-select form-select-sm" name="rows" onchange="documentsBody('<?= $rows; ?>', this.value, '<?= $sort_by; ?>', '<?= $sort_order; ?>', document.getElementById('edu_val').value)">
                                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                            <option value="<?= $i; ?>" <?= $i == $pageno ? 'selected="selected"' : ''; ?>><?= $i . '/' . $total_pages; ?></option>
                                        <?php } ?>
                                    </select>
                                </span>
                            </li>
                        <?php if ($pageno == $total_pages) { ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0);"><i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="documentsBody('<?= $rows; ?>','<?= $pageno + 1; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-right"></i></a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" onclick="documentsBody('<?= $rows; ?>','<?= $total_pages; ?>','<?= $sort_by; ?>','<?= $sort_order; ?>')"><i class="bi bi-chevron-double-right"></i></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>Code</th>
                <th>Origin</th>
                <th>Project</th>
                <th>Discipline</th>
                <th>Document Type</th>
                <th>Document Purpose</th>
                <th>Document Revision</th>
                <th>Version Number</th>
                <th>Est. Start Date</th>
                <th>Est. End Date</th>
                <th>Internal Status</th>
                <th>Client Status</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>            
        </thead>
        <tbody>
        <?php
            $i = (($pageno-1)*$rows)+1;
            if(isset($edms_documents) and !empty($edms_documents)) {
                foreach ($edms_documents as $documents) { ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td><a href="javascript:viewDocument(<?= $documents['id']; ?>)"><?= $documents['code']; ?></a></td>
                        <td class="text-center"><?= $origin_val_ext[$documents['origin']]; ?></td>
                        <td class="text-center"><?= $documents['project_name']; ?></td>
                        <td class="text-center"><?= $documents['discipline_name']; ?></td>
                        <td class="text-center"><?= $documents['doc_type']; ?></td>
                        <td class="text-center"><?= $documents['doc_purpose']; ?></td>
                        <td class="text-center"><?= $documents['doc_revision']; ?></td>
                        <td class="text-center"><?= $documents['version_number']; ?></td>
                        <td class="text-center"><?= displayDate($documents['est_start_date']); ?></td>
                        <td class="text-center"><?= displayDate($documents['est_end_date']); ?></td>
                        <td class="text-center"><span title="<?= $documents['status_name']; ?>"><?= $documents['status_code']; ?></span></td>
                        <td class="text-center"><span title="<?= $documents['approve_name']; ?>"><?= $documents['approve_code']; ?></span></td>
                        <td>
                            <? if($documents['verify_status'] != '' and $documents['approve_status'] != ''){
                                if($documents['status_code'] == $internal_val['code'] and $documents['approve_code'] == $client_val['code']) {
                                    echo "<span class='text text-success'>Completed</span>";
                                }else {
                                    echo "<span class='text text-danger'>Completed</span>";
                                }
                            }else {
                                echo "In Process";
                            } ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionMenu" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="actionMenu">
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="viewDocument(<?= $documents['id']; ?>)"><i class="bi bi-info-square"></i>&nbsp;View</a></li>
                                    <? 
                                    if($documents['verify_status'] == NULL) { ?>
                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="verifyDocument(<?= $documents['id']; ?>,1)"><i class="bi bi-info-square"></i>&nbsp;Verify Document</a></li>
                                    <? }
                                    if($documents['status_code'] == $internal_val['code'] and $documents['approve_status'] == NULL) { ?>
                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="approveDocument(<?= $documents['id']; ?>,2)"><i class="bi bi-info-square"></i>&nbsp;Approve Document</a></li>
                                    <? }
                                    if($documents['status_code'] != $internal_val['code'] and $documents['verify_status'] != NULL) { ?>
                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="addRevisedDocument(<?= $documents['id']; ?>)"><i class="bi bi-info-square"></i>&nbsp;Add Revised Document</a></li>
                                    <?}
                                    if($documents['approve_status'] != NULL and $documents['approve_code'] != $client_val['code']) { ?>
                                        <li><a class="dropdown-item" href="javascript:void(0)" onclick="addRevisedDocument(<?= $documents['id']; ?>)"><i class="bi bi-info-square"></i>&nbsp;Add Revised Document</a></li>
                                    <?}
                                    ?>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="deleteDocument(<?= $documents['id']; ?>)"><i class="bi bi-x-square"></i>&nbsp;Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <? }
            }else { ?>
                <tr>
                    <td colspan="12">
                        <div class="alert alert-danger">
                            No Records Found
                        </div>
                    </td>
                </tr>
            <? }
        ?>
        </tbody>
    </table>
</div>
