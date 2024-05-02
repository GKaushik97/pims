<?php
/**
 * Revised documents
 */
?>
<div class="mb-1">
    <strong>(&nbsp;<?= $revised_doc_total." "."Records"; ?>&nbsp;)</strong>
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
                <th>Verify Status</th>
                <th>Approve Status</th>
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
                        <td>
                            <a class="btn btn-sm btn-primary" href="<? echo WEBROOT;?>edms_docs/<? print $doc_val['document']; ?>" target="_blank"><i class="bi bi-file-earmark-arrow-down"></i></a>
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
                        <td><a href="#">View History</a></td>
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
