<?
/**
 * Edit Document EDMS
 **/
$origin_val = json_decode(ORIGIN);
$id_val = isset($documents['id']) ? $documents['id'] : (isset($params['id']) ? $params['id'] : '');
?>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <form method="post" onsubmit="return false" id="add_document" name="add_document" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?= $id_val; ?>">
  	   		<?= csrf_field() ?>
  	  		<div class="modal-header">
  	  		  <h5 class="modal-title">Edit EDMS Document</h5>
  	  		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  	  		</div>
  	  		<div class="modal-body">
  	  			<div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Project&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="project_id" id="project_id">
                                <option value="">Select</option>
                                <? foreach ($projects as $p_key => $proj_val) { ?>
                                    <option value="<?= $proj_val['id']; ?>"<?if(set_value('project_id') == $proj_val['id']){ echo "selected";}?>><?= $proj_val['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('project_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Origin&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="origin" id="origin">
                                <option value="">Select</option>
                                <? foreach ($origin_val as $o_key => $origin_val) { ?>
                                    <option value="<?= $o_key; ?>"<?if(set_value('origin') == $o_key){ echo "selected";}?>><?= $origin_val; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('origin'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label class="form-label mb-0">Discipline&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="discipline_id" id="discipline_id">
                                <option value="">Select</option>
                                <? foreach ($disciplines as $d_key => $d_val) { ?>
                                    <option value="<?= $d_val['id']; ?>"<?if(set_value('discipline_id') == $d_val['id']){ echo "selected";}?>><?= $d_val['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('discipline_id'); ?></span>
                        </div>
                    </div>
  	  		  	</div>
                <div class="hr1"></div>
                <div class="row">
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
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="est_start_date" class="form-label mb-0">EST Start Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="est_start_date" id="est_start_date" class="form-control" value="<?= set_value('est_start_date'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('est_start_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="est_end_date" class="form-label mb-0">EST End Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="est_end_date" id="est_end_date" class="form-control" value="<?= set_value('est_end_date'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('est_end_date'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="mb-0">
                            <label for="start_date" class="form-label mb-0">Start Date&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="start_date" id="start_date" class="form-control" value="<?= set_value('start_date'); ?>" placeholder="DD-MM-YYYY">
                                <span class="input-group-text" ><i class="bi bi-calendar4-week"></i></span>
                            </div>
                            <span class="text-danger"><?= validation_show_error('start_date'); ?></span>
                        </div>
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
                            <label class="form-label mb-0">Document type&nbsp;<span class="text-danger">*</span>&nbsp;:&nbsp;</label>
                            <select class="form-select form-select-sm" name="document_type_id" id="document_type_id">
                                <option value="">Select</option>
                                <? foreach ($document_types as $dt_key => $type) { ?>
                                    <option value="<?= $type['id']; ?>"<?if(set_value('document_type_id') == $type['id']){ echo "selected";}?>><?= $type['name']; ?></option>
                                <? } ?>
                            </select>
                            <span class="text-danger"><?= validation_show_error('document_type_id'); ?></span>
                        </div>
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
  	  		  	<button type="button" onclick="insertDocument()" class="btn btn-success btn-sm"><i class="bi bi-plus-square"></i>&nbsp;Add Document </button>
  	  		  	<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-square"></i>&nbsp;Close</button>
  	  		</div>
  	  	</form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#est_start_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#est_end_date').datepicker({ format: 'dd-mm-yyyy', autoHide: true });
        $('#start_date').datepicker({ format: 'dd-mm-yyyy', endDate: 'today', autoHide: true });
    });
</script>
