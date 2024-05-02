<?php

$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$sort_order_alt = $sort_order == 'asc' ? 'desc' : 'asc';
$rows = isset($params['rows']) ? $params['rows'] : '';
?>
<div class="clearfix">
	<div class="float-start d-flex align-items-center">
		<div class="me-1">
			<label>Search&nbsp;:&nbsp;</label>
			<input type="text" class="form-control form-control-sm" name="keywords" id="keywords" value="<? print $keywords; ?>" placeholder = "Search Here...">
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="clientBody('<? print $rows; ?>', '<? print $pageno; ?>', '<? print $sort_by ?>', '<? print $sort_order; ?>')"><i class="bi bi-search"></i></button>
			</div>
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<button type="button" class="btn btn-sm btn-warning" name="search" id="search" onclick="resetClientBody()"><i class="bi bi-arrow-clockwise"></i></button>
			</div>
		</div>
		<div class="me-1">
			<label>&nbsp;</label>
			<div>
				<strong>(&nbsp;<? print $tRecords; ?> Records&nbsp;)</strong>
			</div>
		</div>
	</div>
	<div class="float-end d-flex align-items-center">	
		<div class="me-0">
			<label>&nbsp;</label>
			<div>
				<a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="addClient()"><i class="bi bi-plus-square"></i>&nbsp;Add Client</a>
			</div>
		</div>
	</div>			
</div>
<div class="table table-responsive mt-2">
	<table class="table table-bordered table-hover table-striped table-sm">
		<thead>
			<tr>
				<th width="1%" class="text-center">S.No.</th>
				<th><a href="javascript:void(0)" onclick="clientBody('<?= $rows; ?>', '<?= $pageno; ?>', 'code', '<?= $sort_order_alt; ?>')">Code
                        <?php if($sort_by == 'code') { echo ($sort_order == 'desc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a></th>
				<th><a href="javascript:void(0)" onclick="clientBody('<?= $rows; ?>','<?= $pageno; ?>','name','<?= $sort_order_alt; ?>')"> Name
					<?php if($sort_by == 'name') {echo ($sort_order == 'desc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
				</a></th>
				<th>Added Date</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			 $i = 1;
			if (isset($clients) && !empty($clients)) {
				foreach ($clients as $key => $client) { ?>
					<tr>
						<td class="text-center"><?= $i++; ?> </td>
						<td><?= $client['code']; ?></td>
						<td><?= $client['name']; ?></td>
						<td><?= date('d-m-y',strtotime($client['created_at'])); ?></td>
						<td>
							<button type="button" class="btn btn-sm btn-primary" onclick="editClient(<?= $client['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
						    <button type="button" class="btn btn-sm btn-danger" onclick="deleteClient(<?= $client['id']; ?>)"><i class="bi bi-trash"></i></button>
						</td>
						
					</tr>
				<?php }
			        }
			        else {
			    ?>
			    <tr>
			    	<td colspan="5">
			    		<div class="alert alert-warning"> No Records Found</div>
			    	</td>
			    </tr>
			<? }?>
		</tbody>
	</table>
</div>

			        

