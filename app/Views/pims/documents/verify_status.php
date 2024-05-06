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
		<form method="post" name="verify_document" id="verify_document" onsubmit="return false">
			<input type="hidden" name="id" id="id" value="<?= $id_val; ?>" />
			<input type="hidden" name="type" id="type" value="<?= $type_val; ?>" />
			<?= csrf_field(); ?>
			<div class="modal-header">
				<h5 class="modal-title fs-5">Verify Document</h5>
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
				<div class="hr1"></div>
				<div class="row mb-3">
					<div class="col-md-6 col-sm-6 col-xs-12">
                    	<label for="name" class="form-label text-dark">Verify Status&nbsp;<span class="text-danger">*</span>&nbsp;:</label>
                		<div class="col-md-6 col-sm-6 col-xs-12">
                    		<select name="verify_status" id="verify_status" class="form-select form-select-sm">
                    			<option value="">Select</option>
                    			<?
                    			foreach ($status_list as $v_k => $verify) { ?>
                    				<option value="<?= $verify['id']; ?>"<? if($verify['id'] == set_value('verify_status')){ echo "selected"; }?> title="<?= $verify['name']; ?>"><?= $verify['code']."&nbsp;-&nbsp;".$verify['name']; ?></option>
                    			<? }
                    			?>
                    		</select>
                    		<span class="text-danger"><small><?= validation_show_error('verify_status') ?></small></span>
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
                <button type="submit" onclick="updateVerifyStatus()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Verify</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
            </div>
		</form>
	</div>
</div>
