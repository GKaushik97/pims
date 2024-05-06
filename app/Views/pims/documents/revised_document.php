<?php
/**
 * Revised documents
 */
$total_records = isset($revised_doc_total['total_records']) ? $revised_doc_total['total_records'] : '0';
        // print "<pre>"; print_r($doc_history_status); print "</pre>";exit;

?>
<div class="mb-1">
    <strong>(&nbsp;<?= $total_records." "."Records"; ?>&nbsp;)</strong>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th class="text-center">Document</th>
                <th>Document Purpose</th>
                <th>Document Revision</th>
                <th>Version Number</th>
                <th>Internal Status</th>
                <th>Client Status</th>
                <th>Created Date</th>
                <th>Created By</th>
                <th>Updated Date</th>
                <th>Updated By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?
            $i=1;
            if(isset($revised_documents) and !empty($revised_documents))
            {
                foreach ($revised_documents as $key => $doc_val) {?>
                    <tr>
                        <td class="text-center"><? print $i++; ?></td>
                        <td class="text-center">
                            <div class="fs-4"><?= displayFile($doc_val['document']); ?></div>
                        </td>
                        <td><? print $document_purposes[$doc_val['document_purpose_id']]['name']; ?></td>
                        <td><? print $document_revisions[$doc_val['document_revision_id']]['name']; ?></td>
                        <td><? print $doc_val['version_number']; ?></td>
                        <td><? if($doc_val['verify_status'] == NULL) {
                            echo "Under Process";
                        }else {
                             print $status_list[$doc_val['verify_status']]['name'];
                        } ?>
                        </td>
                        <td><? if($doc_val['approve_status'] == NULL) {
                            echo "Under Process";
                        }else{
                             print $status_list[$doc_val['approve_status']]['name'];
                        } ?>
                        </td>
                        <td><?= isset($doc_val['created_at']) ? displayDate($doc_val['created_at']) : '--'; ?></td>
                        <td><?= isset($doc_val['user_name']) ? $doc_val['user_name'] : '--'; ?></td>
                        <td><?= isset($doc_val['updated_at']) ? displayDate($doc_val['updated_at']) : '--'; ?></td>
                        <td><?= isset($doc_val['updated_name']) ? $doc_val['updated_name'] : '--'; ?></td>
                        <td><a class="btn btn-primary btn-sm" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne_<?= $doc_val['id']; ?>" aria-expanded="false" aria-controls="collapseOne"><i class="bi bi-eye"></i>&nbsp;View History</a></td>
                    </tr>
                    <tr id="collapseOne_<?= $doc_val['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <td colspan="12" class="accordion-body">
                            <div >
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th width="1%" class="text-center">S.No</th>
                                            <th>Document Revision ID</th>
                                            <th>Document Status</th>
                                            <th>Comments</th>
                                            <th>Added Date</th>
                                            <th>Added By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $j = 1;
                                        foreach($doc_history_status as $doc_key => $history_val) { 
                                            if($doc_val['id'] == $history_val['edms_document_revision_id']) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $j++; ?></td>
                                                    <td><?= $history_val['edms_document_revision_id']; ?></td>
                                                    <td><?= ($history_val['document_status_id'] > 0) ? $status_list[$history_val['document_status_id']]['name'] : '--'; ?></td>
                                                    <td><?= $history_val['comments']; ?></td>
                                                    <td><?= isset($history_val['created_at']) ? displayDate($history_val['created_at']) : ''; ?></td>
                                                    <td><?= isset($history_val['username']) ? $history_val['username'] : ''; ?></td>
                                                </tr>
                                            <? }
                                         } ?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                <?}
            }
            else{?>
                <tr>
                    <td colspan="4">
                        <div class="alert alert-warning" role="alert">
                            No Records Found
                        </div>
                    </td>
                </tr>
            <?}
            ?>
        </tbody>
    </table>
</div>