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
            <div style="display: block;border: 2px dashed #e1e3e6;background: #f9fbff;border-radius: 6px;padding: 1rem;">
                <div class="d-flex align-items-center">
                    <div class="doc-icon avatars-w-50" style="border-right: 2px dashed #dedede;">
                        <div class="no-img rounded-circle avatar-shadow me-3"><?= displayFile($edms_document['document']); ?></div>
                    </div>
                    <div class="ms-3 w-100">
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="doc-details">
                                    <p>Project</p>
                                    <h4><?php echo isset($edms_document['project_name']) ? $edms_document['project_name'] : 'N/A'; ?></h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="doc-details">
                                    <p>Discipline</p>
                                    <h4><?php echo isset($edms_document['discipline_name']) ? $edms_document['discipline_name'] : 'N/A'; ?></h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">                        
                                <div class="doc-details">
                                    <p>Document Code</p>
                                    <h4><?= $edms_document['code'];?></h4>
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="doc-details">
                                    <p>Version no.</p>
                                    <h4><?php echo isset($edms_document['version_number']) ? $edms_document['version_number'] : '--';?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="candidate-details-header mt-3">
                <nav class="employee-tabs profile-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link <? if($tab_id == 1) { echo 'active'; } ?>" id="nav-document-tab" data-bs-toggle="tab" data-bs-target="#nav-document" type="button" role="tab" aria-controls="nav-employee" aria-selected="true"><i class="bi bi-person-circle"></i>&nbsp;Document Details</button>
                        <button class="nav-link <? if($tab_id == 2) { echo 'active'; } ?>" id="nav-revised_doc-tab" data-bs-toggle="tab" data-bs-target="#nav-revised_doc" type="button" role="tab" aria-controls="nav-document" aria-selected="false"><i class="bi bi-filetype-doc"></i>&nbsp;Document Revisions</button>
                        <button class="nav-link <? if($tab_id == 3) { echo 'active'; } ?>" id="nav-tracking-tab" data-bs-toggle="tab" data-bs-target="#nav-tracking" type="button" role="tab" aria-controls="nav-document" aria-selected="false"><i class="bi bi-filetype-doc"></i>&nbsp;Status History</button>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade <? if($tab_id == 1) { echo 'show active'; } ?>" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h4 class="page-sub-title">Project Details&nbsp;:</h4>                            
                                <div class="table-responsive p-card-table">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td width="160">Project</td>
                                                <td width="1%">:</td>
                                                <td><?php echo isset($edms_document['project_name']) ? $edms_document['project_name'] : 'N/A'; ?></td>
                                            </tr>                                            
                                            <tr>
                                                <td>Discipline</td>
                                                <td>:</td>
                                                <td><?php echo isset($edms_document['discipline_name']) ? $edms_document['discipline_name'] : 'N/A'; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h4 class="page-sub-title">Revisions&nbsp;:</h4>
                                <div class="table-responsive p-card-table">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td width="160">Document Revision</td>
                                                <td width="1%">:</td>
                                                <td><?php echo isset($edms_document['doc_revision']) ? $edms_document['doc_revision'] : '--';?></td>
                                            </tr>
                                            <tr>
                                                <td>Version Number</td>
                                                <td>:</td>
                                                <td><?php echo isset($edms_document['version_number']) ? $edms_document['version_number'] : '--';?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="hr1"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h4 class="page-sub-title">Document Details&nbsp;:</h4>
                                <div class="table-responsive p-card-table">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td width="160">Document Type</td>
                                                <td width="1%">:</td>
                                                <td><?php echo isset($edms_document['doc_type']) ? $edms_document['doc_type'] : 'N/A'; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Document Purpose</td>
                                                <td>:</td>
                                                <td><?php echo isset($edms_document['doc_purpose']) ? $edms_document['doc_purpose'] : '--';?></td>
                                            </tr>
                                            <tr>
                                                <td>Origin</td>
                                                <td>:</td>
                                                <td><?php echo isset($origin_val[$edms_document['origin']]) ? $origin_val[$edms_document['origin']] : '--';?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h4 class="page-sub-title">Estimation Details&nbsp;:</h4>
                                <div class="table-responsive p-card-table">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td width="160">Estimation Start Date</td>
                                                <td width="1%">:</td>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                        
                        <div class="hr1"></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h4 class="page-sub-title">Verification Details&nbsp;:</h4>
                                <div class="table-responsive p-card-table">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td width="160">Internal Status</td>
                                                <td width="1%">:</td>
                                                <td><? echo isset($edms_document['verify_code']) ? $edms_document['verify_code']."&nbsp;-&nbsp;".$edms_document['verify_name'] : '--';?></td>
                                            </tr>
                                            <tr>
                                                <td>Client Status</td>
                                                <td>:</td>
                                                <td><? echo isset($edms_document['approved_code']) ? $edms_document['approved_code']."&nbsp;-&nbsp;".$edms_document['approved_name'] : '--';?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h4 class="page-sub-title">Log Details&nbsp;:</h4>
                                <div class="table-responsive p-card-table">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <td width="160">Added By</td>
                                                <td width="1%">:</td>
                                                <td><? echo isset($edms_document['username']) ? $edms_document['username'] : '--';?></td>
                                            </tr>
                                            <tr>
                                                <td>Added Date</td>
                                                <td>:</td>
                                                <td><?php echo isset($edms_document['created_at']) ? displayDate($edms_document['created_at']) : '--';?></td>
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
                        </div>
                        <div class="hr1"></div>
                        <h4 class="page-sub-title"><i class="bi bi-status"></i>&nbsp;Document Status History&nbsp;:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%" class="text-center">S.No</th>
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
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td><?= $history['edms_document_revision_id']; ?></td>
                                            <td><?= isset($history['doc_status']) ? $history['doc_status'] : '--'; ?></td>
                                            <td><?= $history['comments']; ?></td>
                                            <td><?= isset($history['created_at']) ? displayDate($history['created_at']) : '--'; ?></td>
                                            <td><?= $history['user_name']; ?></td>
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
                    </div>  
                    <div class="tab-pane fade <? if($tab_id == 2) { echo 'show active'; } ?>" id="nav-revised_doc" role="tabpanel" aria-labelledby="nav-revised_doc-tab" tabindex="0">
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
<style type="text/css">
    .avatars-w-50 .no-img {
        align-items: center;
        background-color: #0d6efd;
        color: #ffffff;
        display: flex;
        font-size: 28px;
        justify-content: center;
    }
    .avatars-w-50 .no-img {
        height: 65px;
        width: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .avatars-w-50 .no-img i, .avatars-w-50 .no-img a {
        line-height: 0px;
        color: #ffffff;
    }
    .avatar-shadow {
        box-shadow: -2px 2px 4px 0 rgba(0,0,0,.2) !important;
    }
    .doc-details p {
        margin-bottom: 0.5rem;
    }
    .doc-details h4 {
        margin: 0px;
        font-size: 1rem;
    }
    .page-sub-title {
        display: inline-block;
        border-bottom: 1px solid #535353;
    }
</style>