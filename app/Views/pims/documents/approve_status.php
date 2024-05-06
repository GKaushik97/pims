<?php
/**
 * Verify Status
 */ 
$id_val = isset($params['id']) ? $params['id'] : '';
$type_val = isset($params['type']) ? $params['type'] : '';
$origin_ext = json_decode(ORIGIN,true);

?>
<div class="modal-dialog modal-xl">
	<div class="modal-content">
		<form method="post" name="approve_document" id="approve_document" onsubmit="return false">
			<input type="hidden" name="id" id="id" value="<?= $id_val; ?>" />
			<input type="hidden" name="type" id="type" value="<?= $type_val; ?>" />
			<?= csrf_field(); ?>
			<div class="modal-header">
				<h5 class="modal-title fs-5">Approve Document</h5>
            	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row mb-3">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<label class="form-label text-dark">Document Code</label>
						<div><?= $revision_document['code']; ?></div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<label class="form-label text-dark">Origin</label>
						<div><?= $origin_ext[$revision_document['origin']]; ?></div>
					</div>
				</div>
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
				<div class="row mb-3">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<label class="form-label text-dark">Added Date</label>
						<div><?= displayDate($revision_document['created_at']); ?></div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<label class="form-label text-dark">Added By</label>
						<div><?= $revision_document['username']; ?></div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<label class="form-label text-dark">Verified Date</label>
						<div><?= displayDate($revision_document['updated_at']); ?></div>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<label class="form-label text-dark">Verified By</label>
						<div><?= $revision_document['update_name']; ?></div>
					</div>
				</div>
				<div class="hr1"></div>
				<div class="row mb-3">
					<div class="col-md-6 col-sm-6 col-xs-12">
                    	<label for="approve_status" class="form-label text-dark">Approval Status&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                		<div class="col-md-6 col-sm-6 col-xs-12">
                    		<select name="approve_status" id="approve_status" class="form-select form-select-sm">
                    			<option value="">Select</option>
                    			<?
                    			foreach ($status_list_app as $a_k => $verify_app) { ?>
                    				<option value="<?= $verify_app['id']; ?>"<? if($verify_app['id'] == set_value('approve_status')){ echo "selected";}?> title="<?= $verify_app['name']; ?>"><?= $verify_app['code']."&nbsp;-&nbsp;".$verify_app['name']; ?></option>
                    			<? }
                    			?>
                    		</select>
                    		<span class="text-danger"><small><?= validation_show_error('approve_status') ?></small></span>
                		</div>
                	</div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="description" class="form-label mb-0">Description&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <textarea class="form-control" name="comments" id="comments" placeholder="Message"><?= set_value('description'); ?></textarea>
                            <span class="text-danger"><?= validation_show_error('comments'); ?></span>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
                <button type="submit" onclick="updateApproveStatus()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Submit</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
		</form>
	</div>
</div>
