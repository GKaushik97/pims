<?php
/**
 * Revised documents
 */
$total_records = isset($revised_doc_total['total_records']) ? $revised_doc_total['total_records'] : '0';
?>
<div class="mb-1">
    <strong>(&nbsp;<?= $total_records." "."Records"; ?>&nbsp;)</strong>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                <th>Document</th>
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
                            <?= displayFile($doc_val['document']); ?>
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
                        <td><a href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne_<?= $doc_val['id']; ?>" aria-expanded="false" aria-controls="collapseOne">View History</a></td>
                    </tr>
                    <tr id="collapseOne_<?= $doc_val['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <td colspan="12" class="accordion-body">
                            <div >
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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