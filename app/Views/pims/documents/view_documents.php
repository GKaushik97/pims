<?php
/**
 * view Document details
 */
$tab_id = isset($tab_id) ? $tab_id : 1;
$origin_val = json_decode(ORIGIN, true);
?>
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <?php if (isset($edms_document) && isset($edms_document['code'])): ?>
            <h5 class="modal-title">Document Details - #<?= $edms_document['code'];?></h5>
            <?php endif; ?>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="candidate-details-header">
                <nav class="employee-tabs profile-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link <? if($tab_id == 1) { echo 'active'; } ?>" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" type="button" role="tab" aria-controls="nav-employee" aria-selected="true"><i class="bi bi-person-circle"></i>&nbsp;Document Details</button>
                        <button class="nav-link <? if($tab_id == 2) { echo 'active'; } ?>" id="nav-revised_doc-tab" data-bs-toggle="tab" data-bs-target="#nav-revised_doc" type="button" role="tab" aria-controls="nav-document" aria-selected="false"><i class="bi bi-filetype-doc"></i>&nbsp;Revised Documents</button>
                        <button class="nav-link <? if($tab_id == 3) { echo 'active'; } ?>" id="nav-tracking-tab" data-bs-toggle="tab" data-bs-target="#nav-tracking" type="button" role="tab" aria-controls="nav-document" aria-selected="false"><i class="bi bi-filetype-doc"></i>&nbsp;Tracking Document</button>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade <? if($tab_id == 1) { echo 'show active'; } ?>" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab" tabindex="0">
                        <div>
                            <h4 class="page-sub-title"><i class="bi bi-passport"></i>&nbsp;Current Document Details</h4>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="table-responsive p-card-table">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td width="130">Project</td>
                                                    <td width="1%">:</td>
                                                    <td><?php echo isset($edms_document['project_name']) ? $edms_document['project_name'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="130">Discipline</td>
                                                    <td width="1%">:</td>
                                                    <td><?php echo isset($edms_document['discipline_name']) ? $edms_document['discipline_name'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="130">Document Type</td>
                                                    <td width="1%">:</td>
                                                    <td><?php echo isset($edms_document['doc_type']) ? $edms_document['doc_type'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Origin</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($origin_val[$edms_document['origin']]) ? $origin_val[$edms_document['origin']] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td width="160">Document Purpose</td>
                                                    <td width="1%">:</td>
                                                    <td><?php echo isset($edms_document['doc_purpose']) ? $edms_document['doc_purpose'] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Document Revision</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($edms_document['doc_revision']) ? $edms_document['doc_revision'] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Version Number</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($edms_document['version_number']) ? $edms_document['version_number'] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Estimation Start Date</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($edms_document['est_start_date']) ? displayDate($edms_document['est_start_date']) : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Estimation Start Date</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($edms_document['est_end_date']) ? displayDate($edms_document['est_end_date']) : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Start Date</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($edms_document['start_date']) ? displayDate($edms_document['start_date']) : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Internal Status</td>
                                                    <td>:</td>
                                                    <td><? echo isset($edms_document['verify_code']) ? $edms_document['verify_code']."&nbsp;-&nbsp;".$edms_document['verify_name'] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Client Status</td>
                                                    <td>:</td>
                                                    <td><? echo isset($edms_document['approved_code']) ? $edms_document['approved_code']."&nbsp;-&nbsp;".$edms_document['approved_name'] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Added By</td>
                                                    <td>:</td>
                                                    <td><? echo isset($edms_document['username']) ? $edms_document['username'] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Added Date</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($edms_document['created_at']) ? displayDate($edms_document['created_at']) : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Added By</td>
                                                    <td>:</td>
                                                    <td><? echo isset($edms_document['username']) ? $edms_document['username'] : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Updated Date</td>
                                                    <td>:</td>
                                                    <td><?php echo isset($edms_document['updated_at']) ? displayDate($edms_document['updated_at']) : '--';?></td>
                                                </tr>
                                                <tr>
                                                    <td>Updated By</td>
                                                    <td>:</td>
                                                    <td><? echo isset($edms_document['update_name']) ? $edms_document['update_name'] : '--';?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="hr1"></div>                                
                                <h4 class="page-sub-title"><i class="bi bi-status"></i>&nbsp;Document Status History</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Document Revision ID</th>
                                            <th>Document Status</th>
                                            <th>Comments</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? 
                                        $i =1;
                                        if(isset($rev_doc_history_status) and !empty($rev_doc_history_status)) { 
                                            foreach ($rev_doc_history_status as $rdh_key => $history) { ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $history['edms_document_revision_id']; ?></td>
                                                    <td><?= $history['document_status_id']; ?></td>
                                                    <td><?= $history['comments']; ?></td>
                                                    <td><?= displayDate($history['created_at']); ?></td>
                                                    <td><?= $history['created_by']; ?></td>
                                                </tr>
                                            <? }
                                        }else { ?>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="alert alert-danger">No Records Found</div>
                                                </td>
                                            </tr>
                                        <? } ?>
                                    </tbody>
                                </table>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="table-responsive p-card-table">
                                        <table class="table table-borderless">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="tab-pane fade <? if($tab_id == 2) { echo 'show active'; } ?>" id="nav-revised_doc" role="tabpanel" aria-labelledby="nav-revised_doc-tab" tabindex="0">
                        <div class="hr1"></div>
                        <div id="revised-document">
                            <? echo view('pims/documents/revised_document');?>
                        </div>
                    </div>
                    <div class="tab-pane fade <? if($tab_id == 3) { echo 'show active'; } ?>" id="nav-tracking" role="tabpanel" aria-labelledby="nav-tracking-tab" tabindex="0">
                        <div>
                            <h4>Document Tracking</h4>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><span class="bi bi-x-square"></span>&nbsp;Close</button>
        </div>
    </div>
</div>