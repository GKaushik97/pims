<?php
/**
 * Verify Status
 */ 
$id_val = isset($id) ? $id : '';
?>
<div class="modal-dialog modal-xl">
	<div class="modal-content">
		<form method="post" name="revised_document" id="revised_document" onsubmit="return false">
			<input type="hidden" name="edms_document_id" id="edms_document_id" value="<?= $id_val; ?>" />
			<?= csrf_field(); ?>
			<div class="modal-header">
				<h5 class="modal-title fs-5">Add Document Revision</h5>
            	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="form-label text-dark">Project</label>
                        <div><?= $revision_document['project_name']; ?></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="form-label text-dark">Discipline</label>
                        <div><?= $revision_document['discipline_name']; ?></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="form-label text-dark">Document Type</label>
                        <div><?= $revision_document['doc_type']; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="form-label text-dark">Document Purpose</label>
                        <div><?= $revision_document['doc_purpose']; ?></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="form-label text-dark">Document Revision</label>
                        <div><?= $revision_document['doc_revision']; ?></div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="form-label text-dark">Version Number</label>
                        <div><?= $revision_document['version_number']; ?></div>
                    </div>
                </div>
                <div class="hr1"></div>
				<div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Document Purpose&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="document_purpose_id" id="document_purpose_id">
                                <option value="">Select</option>
                                <? foreach ($document_purposes as $dp_key => $purpose) { ?>
                                    <option value="<?= $purpose['id']; ?>"<?if(set_value('document_purpose_id') == $purpose['id']){ echo "selected";}?>><?= $purpose['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('document_purpose_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Document Revision&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="document_revision_id" id="document_revision_id">
                                <option value="">Select</option>
                                <? foreach ($document_revisions as $dr_key => $revision) { ?>
                                    <option value="<?= $revision['id']; ?>"<?if(set_value('document_revision_id') == $revision['id']){ echo "selected";}?>><?= $revision['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('document_revision_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Version Number&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <input type="text" name="version_number" id="version_number" class="form-control form-control-sm" value="<?= set_value('version_number'); ?>" placeholder="Please Enter version Number">
                        </div>
                        <span class="text-danger"><?= validation_show_error('version_number'); ?></span>
                    </div>
  	  		  	</div>
  	  		  	<div class="hr1"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="mb-0">
                            <label for="photo" class="form-label mb-0">Document</label>
                            <input type="file" class="form-control form-control-sm" name="document" id="document">
                            <small class="text-muted">Allowed File Types :.pdf,.png,.doc,.docx,.jpg,.jpeg MaxSize : 20MB</small>
                        </div>
                        <span class="text-danger"><?= validation_show_error('document'); ?></span>
                    </div>
                </div>
  	  		  	<div class="hr1"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="description" class="form-label mb-0">Description&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Message"><?= set_value('description'); ?></textarea>
                            <span class="text-danger"><?= validation_show_error('description'); ?></span>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
                <button type="submit" onclick="updateRevisedDocument()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add Revised Document</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
		</form>
	</div>
</div>
