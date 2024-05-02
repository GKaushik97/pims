<?php
/**
 * Internal Document status Body Page
 */ 
$int_keywords = isset($params['int_keywords']) ? $params['int_keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$sort_order_alt = ($params['sort_order'] == "desc") ? 'asc' : 'desc';
$arrow = ($params['sort_order'] == "desc") ? '<i class="bi bi-arrow-down">&nbsp;</i>' : '<i class="bi bi-arrow-up">&nbsp;</i>';
$rows = isset($params['rows']) ? $params['rows'] : '';
$int_tRecords = isset($params['int_tRecords']) ? $params['int_tRecords'] : "0";
?>
<?php
/**
 * Client Document status Body Page
 */ 
$cli_keywords = isset($params['cli_keywords']) ? $params['cli_keywords'] : '';
$cli_pageno = isset($params['cli_pageno']) ? $params['cli_pageno'] : '';
$cli_sort_by = isset($params['cli_sort_by']) ? $params['cli_sort_by'] : '';
$cli_sort_order = isset($params['cli_sort_order']) ? $params['cli_sort_order'] : '';
$cli_sort_order_alt = ($params['cli_sort_order'] == "desc") ? 'asc' : 'desc';
$cli_arrow = ($params['cli_sort_order'] == "desc") ? '<i class="bi bi-arrow-down">&nbsp;</i>' : '<i class="bi bi-arrow-up">&nbsp;</i>';
$cli_rows = isset($params['cli_rows']) ? $params['cli_rows'] : '';
$cli_tRecords = isset($params['cli_tRecords']) ? $params['cli_tRecords'] : "0";
?>
<div class="clearfix">
	<div class="float-start d-flex align-items-center">
		<div class="me-1">
			<label>Search&nbsp;:&nbsp;</label>
			<input type="text" class="form-control form-control-sm" name="int_keywords" id="int_keywords" value="<? print $int_keywords; ?>">
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="documentStatusBody('<? print $rows; ?>', '<? print $pageno; ?>', '<? print $sort_by ?>', '<? print $sort_order; ?>')"><i class="bi bi-search"></i></button>
			</div>
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<button type="button" class="btn btn-sm btn-warning" name="search" id="search" onclick="resetDocumentStatusBody()"><i class="bi bi-arrow-clockwise"></i></button>
			</div>
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<strong>(&nbsp;<? print $int_tRecords; ?> Records&nbsp;)</strong>
			</div>
		</div>
	</div>
	<input type="hidden" name="rows" id="rows" value="<?= $rows ?>">
	<input type="hidden" name="pageno" id="pageno" value="<?= $pageno ?>">
	<input type="hidden" name="sort_by" id="sort_by" value="<?= $sort_by ?>">
	<input type="hidden" name="sort_order" id="sort_order" value="<?= $sort_order ?>">
	<div class="float-end d-flex align-items-center">	
		<div class="me-0">
			<label>&nbsp;</label>
			<div>
				<a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addIntDocumentStatus(1)"><i class="bi bi-plus-square"></i>&nbsp;Add Internal Document Status</a>
			</div>
		</div>
	</div>
</div>

<div class="table table-responsive mt-2">
	<table class="table table-bordered table-hover table-striped table-sm">
		<thead>
			<tr>
				<th width="1%" class="text-center">S.No.</th>
				<th nowrap><a href="javascript:void(0)" onclick="documentStatusBody('<? print $rows; ?>', '<? print $pageno; ?>', 'code', '<? print $sort_order_alt; ?>')">Code&nbsp;<? if ($sort_by == "code") { print $arrow; } ?></a></th>
				<th nowrap><a href="javascript:void(0)" onclick="documentStatusBody('<? print $rows; ?>', '<? print $pageno; ?>', 'name', '<? print $sort_order_alt; ?>')">Name&nbsp;<? if ($sort_by == "name") { print $arrow; } ?></a></th>
				<th nowrap><a href="javascript:void(0)" onclick="documentStatusBody('<? print $rows; ?>', '<? print $pageno; ?>', 'status', '<? print $sort_order_alt; ?>')">Status&nbsp;<? if ($sort_by == "status") { print $arrow; } ?></a></th>
				<th nowrap>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 	
			$i=1;
			if(isset($internal_statuses) and !empty($internal_statuses)){
				foreach ($internal_statuses as $d_key => $d_status) {
				 ?>
				<tr>
					<td class="text-center"><?= $i++; ?></td>
					<td><?= $d_status['code']; ?></td>
					<td><?= $d_status['name']; ?></td>
					<td><?= (isset($d_status['status']) and $d_status['status'] == 0) ? "Disabled" : "Enabled" ; ?></td>
					<td>
				  	  	<a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="editDocumentStatus(<?= $d_status['id']; ?>)"><i class="bi bi-pencil-square"></i></a>
				  	  	<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="deleteDocumentStatus(<?= $d_status['id']; ?>)"><i class="bi bi-trash"></i></a>
					</td>
				</tr>
			<?  }
		}
		else { ?>
			<tr>
				<td colspan="5" class="bg bg-warning">No Records Found</td>
			</tr>
		<? } ?>
		</tbody>
	</table>
</div>

<?php
/**
 * Client Document status Body Page
 */ 
?>

<div class="clearfix">
	<div class="float-start d-flex align-items-center">
		<div class="me-1">
			<label>Search&nbsp;:&nbsp;</label>
			<input type="text" class="form-control form-control-sm" name="cli_keywords" id="cli_keywords" value="<? print $cli_keywords; ?>">
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="clientDocumentStatusBody('<? print $cli_rows; ?>', '<? print $cli_pageno; ?>', '<? print $cli_sort_by ?>', '<? print $cli_sort_order; ?>')"><i class="bi bi-search"></i></button>
			</div>
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<button type="button" class="btn btn-sm btn-warning" name="search" id="search" onclick="resetClientDocumentStatusBody()"><i class="bi bi-arrow-clockwise"></i></button>
			</div>
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<strong>(&nbsp;<? print $cli_tRecords; ?> Records&nbsp;)</strong>
			</div>
		</div>
	</div>
	<input type="hidden" name="cli_rows" id="cli_rows" value="<?= $cli_rows ?>">
	<input type="hidden" name="cli_pageno" id="cli_pageno" value="<?= $cli_pageno ?>">
	<input type="hidden" name="cli_sort_by" id="cli_sort_by" value="<?= $cli_sort_by ?>">
	<input type="hidden" name="cli_sort_order" id="cli_sort_order" value="<?= $cli_sort_order ?>">
	<div class="float-end d-flex align-items-center">	
		<div class="me-0">
			<label>&nbsp;</label>
			<div>
				<a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addIntDocumentStatus(2)"><i class="bi bi-plus-square"></i>&nbsp;Add Client Document Status</a>
			</div>
		</div>
	</div>
</div>

<div class="table table-responsive mt-2">
	<table class="table table-bordered table-hover table-striped table-sm">
		<thead>
			<tr>
				<th width="1%" class="text-center">S.No.</th>
				<th nowrap><a href="javascript:void(0)" onclick="clientDocumentStatusBody('<? print $cli_rows; ?>', '<? print $cli_pageno; ?>', 'code', '<? print $cli_sort_order_alt; ?>')">Code&nbsp;<? if ($cli_sort_by == "code") { print $cli_arrow; } ?></a></th>
				<th nowrap><a href="javascript:void(0)" onclick="clientDocumentStatusBody('<? print $cli_rows; ?>', '<? print $cli_pageno; ?>', 'name', '<? print $cli_sort_order_alt; ?>')">Name&nbsp;<? if ($cli_sort_by == "name") { print $cli_arrow; } ?></a></th>
				<th nowrap><a href="javascript:void(0)" onclick="clientDocumentStatusBody('<? print $cli_rows; ?>', '<? print $cli_pageno; ?>', 'status', '<? print $cli_sort_order_alt; ?>')">Status&nbsp;<? if ($cli_sort_by == "status") { print $cli_arrow; } ?></a></th>
				<th nowrap>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 	
			$i=1;
			if(isset($client_statuses) and !empty($client_statuses)){
				foreach ($client_statuses as $d_key => $cli_status) {
				 ?>
				<tr>
					<td class="text-center"><?= $i++; ?></td>
					<td><?= $cli_status['code']; ?></td>
					<td><?= $cli_status['name']; ?></td>
					<td><?= (isset($cli_status['status']) and $cli_status['status'] == 0) ? "Disabled" : "Enabled" ; ?></td>
					<td>
				  	  	<a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="editDocumentStatus(<?= $cli_status['id']; ?>)"><i class="bi bi-pencil-square"></i></a>
				  	  	<a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="deleteDocumentStatus(<?= $cli_status['id']; ?>)"><i class="bi bi-trash"></i></a>
					</td>
				</tr>
			<?  }
		}
		else { ?>
			<tr>
				<td colspan="5" class="bg bg-warning">No Records Found</td>
			</tr>
		<? } ?>
		</tbody>
	</table>
</div>