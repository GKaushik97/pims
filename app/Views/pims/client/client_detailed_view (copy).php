<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>
	<div>
		<label>Client Name&nbsp;:&nbsp;</label>
		<label><strong><? print $client['name']; ?></strong></label>
	</div>
	<div>
		<div class="table table-responsive mt-2">
			<table class="table table-bordered table-striped table-centered mb-0">
				<thead class="table-light">
					<tr>
						<th>Catogory</th>
						<th class="text-end">Receivables</th>
						<th class="text-end">Received</th>
						<th class="text-end">Balance</th>
						<th></th>
					</tr>						
				</thead>
				<tbody>
					<?
					$eng_inv_total = $pro_inv_total = $cons_inv_total = $eng_paid_total = $pro_paid_total = $cons_paid_total = $eng_bal_amt = $pro_bal_amt = $cons_bal_amt = $eng_basic = $eng_deds = $eng_paids = $pro_basic = $pro_deds = $pro_paids = $cons_basic = $cons_deds = $cons_paids = 0;
					$inv_proj_sums = $client_inv_sums[] = array();
					if (isset($projects) && !empty($projects)) {
						foreach ($projects as $p_key => $project) {
							if (isset($inv_totals[$p_key])) {
								if (isset($inv_categories) && !empty($inv_categories)) {
									foreach ($inv_categories as $key => $category) {

										if (isset($inv_totals[$p_key][$key])) {
											print "<pre>"; print_r($inv_totals[$p_key][$key]); print "</pre>";
											if ($key == 1) {
												$eng_base_amt = (isset($inv_totals[$p_key][$key]['base_total']) && !empty($inv_totals[$p_key][$key]['base_total'])) ? $inv_totals[$p_key][$key]['base_total'] : 0;
												$eng_ded_amt = (isset($inv_totals[$p_key][$key]['deductions']) && !empty($inv_totals[$p_key][$key]['deductions'])) ? $inv_totals[$p_key][$key]['deductions'] : 0;
												$eng_paid_total = (isset($inv_totals[$p_key][$key]['paid_total']) && !empty($inv_totals[$p_key][$key]['paid_total'])) ? $inv_totals[$p_key][$key]['paid_total'] : 0;
												$eng_inv_total = $eng_base_amt - $eng_ded_amt;
												$eng_bal_amt = $eng_inv_total - $eng_paid_total;

												$inv_proj_sums[$p_key][$key]['invoice_amt'] = $eng_inv_total;
												$inv_proj_sums[$p_key][$key]['paid_amt'] = $eng_paid_total;
												$inv_proj_sums[$p_key][$key]['balance_amt'] = $eng_bal_amt;

												$eng_basic += $eng_base_amt;
												$eng_deds += $eng_ded_amt;
												$eng_paids += $eng_paid_total;


											}
											elseif ($key == 2) {
												$pro_base_amt = (isset($inv_totals[$p_key][$key]['base_total']) && !empty($inv_totals[$p_key][$key]['base_total'])) ? $inv_totals[$p_key][$key]['base_total'] : 0;
												$pro_ded_amt = (isset($inv_totals[$p_key][$key]['deductions']) && !empty($inv_totals[$p_key][$key]['deductions'])) ? $inv_totals[$p_key][$key]['deductions'] : 0;
												$pro_paid_total = (isset($inv_totals[$p_key][$key]['paid_total']) && !empty($inv_totals[$p_key][$key]['paid_total'])) ? $inv_totals[$p_key][$key]['paid_total'] : 0;
												$pro_inv_total = $pro_base_amt - $pro_ded_amt;
												$pro_bal_amt = $pro_inv_total - $pro_paid_total;

												$inv_proj_sums[$p_key][$key]['invoice_amt'] = $pro_inv_total;
												$inv_proj_sums[$p_key][$key]['paid_amt'] = $pro_paid_total;
												$inv_proj_sums[$p_key][$key]['balance_amt'] = $pro_bal_amt;

												$pro_basic += $pro_base_amt;
												$pro_deds += $pro_ded_amt;
												$pro_paids += $pro_paid_total;

											}
											elseif ($key == 3) {
												$cons_base_amt = (isset($inv_totals[$p_key][$key]['base_total']) && !empty($inv_totals[$p_key][$key]['base_total'])) ? $inv_totals[$p_key][$key]['base_total'] : 0;
												$cons_ded_amt = (isset($inv_totals[$p_key][$key]['deductions']) && !empty($inv_totals[$p_key][$key]['deductions'])) ? $inv_totals[$p_key][$key]['deductions'] : 0;
												$cons_paid_total = (isset($inv_totals[$p_key][$key]['paid_total']) && !empty($inv_totals[$p_key][$key]['paid_total'])) ? $inv_totals[$p_key][$key]['paid_total'] : 0;
												$cons_inv_total = $cons_base_amt - $cons_ded_amt;
												$cons_bal_amt = $cons_inv_total - $cons_paid_total;

												$inv_proj_sums[$p_key][$key]['invoice_amt'] = $cons_inv_total;
												$inv_proj_sums[$p_key][$key]['paid_amt'] = $cons_paid_total;
												$inv_proj_sums[$p_key][$key]['balance_amt'] = $cons_bal_amt;

												$cons_basic += $cons_base_amt;
												$cons_deds += $cons_ded_amt;
												$cons_paids += $cons_paid_total;
											}
										}
							 		}
							 	}
							} 
						}
					}
					print "<pre>"; print_r($inv_proj_sums); print "</pre>";
					print "<pre>"; print_r($cons_basic); print "</pre>";
					print "<pre>"; print_r($cons_deds); print "</pre>";
					print "<pre>"; print_r($cons_paids); print "</pre>";

					$total_basic_amt = $total_ded_amt = $total_receivable_amt = $total_paid_amt = $total_balance = 0;
					if (isset($inv_categories) && !empty($inv_categories)) {
						foreach ($inv_categories as $key => $category) {
							$base_total = (isset($client_inv_sums[$key]['base_total']) && !empty($client_inv_sums[$key]['base_total'])) ? $client_inv_sums[$key]['base_total'] : 0;
							$ded_totals = (isset($client_inv_sums[$key]['deductions']) && !empty($client_inv_sums[$key]['deductions'])) ? $client_inv_sums[$key]['deductions'] : 0;
							$receivables = $base_total - $ded_totals;
							$received_amt = (isset($client_inv_sums[$key]['paid_total']) && !empty($client_inv_sums[$key]['paid_total'])) ? $client_inv_sums[$key]['paid_total'] : 0;
							$balances = $receivables - $received_amt;

							$percent = ((isset($receivables) && $receivables > 0) && (isset($received_amt) && $received_amt > 0)) ? ($received_amt/$receivables)*100 : 0;
							$percent_val = (isset($percent) && !empty($percent)) ? round($percent,2) : 0;

							$total_receivable_amt += $receivables;
							$total_paid_amt += $received_amt;
							$total_balance += $balances;
							?>
							<tr>
								<td><strong><? print $category; ?></strong></td>
								<td class="text-end"><? print displayMoney($receivables,2); ?></td>
								<td class="text-end"><? print displayMoney($received_amt,2); ?></td>
								<td class="text-end"><? print displayMoney($balances,2); ?></td>
								<td>
									<div class="progress " role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                		<div class="progress-bar bg-success" style="width: <? echo $percent_val; ?>%;"><? echo $percent_val; ?>%</div>
                        			</div>
                        		</td>
							</tr>
						<?
						}
					} 
					?>
					<tr>
						<td>Totals</td>
						<td class="text-end"><? print displayMoney($total_receivable_amt,2); ?></td>
						<td class="text-end"><? print displayMoney($total_paid_amt,2); ?></td>
						<td class="text-end"><? print displayMoney($total_balance,2); ?></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div>
		<div>
			<label>Project Details&nbsp;:&nbsp;</label>
			<div class="table table-responsive mt-2">
				<table class="table table-bordered table-hover table-striped table-condensed">
					<thead>
						<tr class="align-middle">
							<th rowspan="2" width="1%" class="text-center">S.No.</th>
							<th rowspan="2" nowrap="">Code</th>
							<th rowspan="2" nowrap="">Name</th>
							<th rowspan="2" nowrap="">Location</th>
							<th rowspan="2" nowrap="" class="text-end">Total in INR</th>
							<th rowspan="2" nowrap="" class="text-end">Contract Value(in Crs)</th>
							<th colspan="3" nowrap="" class="text-center">Receivables</th>
							<th colspan="3" nowrap="" class="text-center">Received</th>
							<th colspan="3" nowrap="" class="text-center">Balance</th>
						</tr>
						<tr class="align-middle">
							<th class="text-end">Engineering</th>
							<th class="text-end">Procurement</th>
							<th class="text-end">Construction</th>
							<th class="text-end">Engineering</th>
							<th class="text-end">Procurement</th>
							<th class="text-end">Construction</th>
							<th class="text-end">Engineering</th>
							<th class="text-end">Procurement</th>
							<th class="text-end">Construction</th>
						</tr>
					</thead>
					<tbody>
					<?
					$i = 1;
					if (isset($projects) && !empty($projects)) {
						foreach ($projects as $key => $project) { 
							$conversion_inr = $project['ex_rate']*$project['contract_value'];
							$total_inr = $project['contract_value_inr']+$conversion_inr;
							$amt_in_cr = $total_inr/10000000; ?>
							<tr>
								<td class="text-center"><?= $i++ ?></td>
								<td><?= $project['code'] ?></td>
								<td><?= $project['name'] ?></td>
								<td><?= (isset($locations[$project['location']]) && !empty($locations[$project['location']])) ? $locations[$project['location']]['name'] : "-" ?></td>
								<td class="text-end"><?= displayNumber($total_inr) ?></td>
								<td class="text-end"><?= displayNumber($amt_in_cr,2) ?></td>
							</tr>
						<?
						}
					}
					else { 
						?>
						<tr>
							<td class="alert alert-warning" colspan="15">No Records Found</td>
						</tr>
					<?
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div>
		<label>Invoice Details&nbsp;:&nbsp;</label>
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		  	<li class="nav-item" role="presentation">
		    	<button class="nav-link active" id="engineering-tab" data-bs-toggle="tab" data-bs-target="#engineering" type="button" role="tab" aria-controls="engineering" aria-selected="true">Engineering</button>
		  	</li>
		  	<li class="nav-item" role="presentation">
		    	<button class="nav-link" id="procurement-tab" data-bs-toggle="tab" data-bs-target="#procurement" type="button" role="tab" aria-controls="procurement" aria-selected="false">Procurement</button>
		  	</li>
		  	<li class="nav-item" role="presentation">
		    	<button class="nav-link" id="construction-tab" data-bs-toggle="tab" data-bs-target="#construction" type="button" role="tab" aria-controls="construction" aria-selected="false">Construction</button>
		  	</li>
		</ul>
		<div class="tab-content" id="myTabContent">
		  	<div class="tab-pane fade show active" id="engineering" role="tabpanel" aria-labelledby="engineering-tab">
				<div class="table table-responsive mt-2">
			        <table class="table table-bordered table-hover table-striped table-condensed">
			            <thead>
			                <tr class="align-middle">
			                    <th rowspan="2" width="1%" class="text-center">S.No.</th>
			                    <th rowspan="2">Invoice No.</th>
			                    <th rowspan="2">Date</th>
			                    <th rowspan="2">Project</th>
			                    <!-- <th rowspan="2">Client</th> -->
			                    <th rowspan="2">Type</th>
			                    <th colspan="4" class="text-center">Invoice Value</th>
			                    <th colspan="6" class="text-center">Deductions</th>
			                    <th rowspan="2" class="text-end">Total</th>
			                    <th rowspan="2" class="text-end">Received</th>
			                    <th rowspan="2" class="text-end">Balance</th>
			                </tr>
			                <tr class="align-middle">
			                    <th class="text-end">Basic</th>
			                    <th class="text-end">SGST</th>
			                    <th class="text-end">CGST</th>
			                    <th class="text-end">Total</th>
			                    <th class="text-end">TDS</th>
			                    <th class="text-end" nowrap="">TDS-SGST</th>
			                    <th class="text-end" nowrap="">TDS-CGST</th>
			                    <th class="text-end" nowrap="">Labour Cess</th>
			                    <th class="text-end">Others</th>
			                    <th class="text-end">Total D</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?
							$i = 1;
							if (isset($invoices[1]) && !empty($invoices[1])) {
								foreach ($invoices[1] as $key => $invoice) { 
									$basic = (isset($invoice['basic']) && !empty($invoice['basic'])) ? $invoice['basic'] : 0;
									$basic_sgst = (isset($invoice['sgst']) && !empty($invoice['sgst'])) ? $invoice['sgst'] : 0;
									$basic_cgst = (isset($invoice['cgst']) && !empty($invoice['cgst'])) ? $invoice['cgst'] : 0;
									$basic_total = (isset($invoice['total']) && !empty($invoice['total'])) ? $invoice['total'] : 0;
									$tds = (isset($invoice['tds']) && !empty($invoice['tds'])) ? $invoice['tds'] : 0;
									$tds_sgst = (isset($invoice['tds_sgst']) && !empty($invoice['tds_sgst'])) ? $invoice['tds_sgst'] : 0;
									$tds_cgst = (isset($invoice['tds_cgst']) && !empty($invoice['tds_cgst'])) ? $invoice['tds_cgst'] : 0;
									$lbr_cess = (isset($invoice['labour_cess']) && !empty($invoice['labour_cess'])) ? $invoice['labour_cess'] : 0;
									$other_ded = (isset($invoice['other_deductions']) && !empty($invoice['other_deductions'])) ? $invoice['other_deductions'] : 0;
									$total_ded = $tds+$tds_sgst+$tds_cgst+$lbr_cess+$other_ded;
									$g_total = $basic_total - $total_ded;
									$total_received = (isset($invoice['total_received']) && !empty($invoice['total_received'])) ? $invoice['total_received'] : 0;
									$balance_amt = $g_total - $total_received;

			            	 ?>
			            	 <tr>
			            	 	<td><?= $i++ ?></td>
			            	 	<td><?= $invoice['inv_number'] ?></td>
			            	 	<td><?= displayDate($invoice['inv_date']) ?></td>
			            	 	<td><?= (isset($projects[$invoice['project_id']]) && !empty($projects[$invoice['project_id']])) ? $projects[$invoice['project_id']]['name'] : "-" ?></td>
			            	 	<!-- <td><?= $client['name'] ?></td> -->
			            	 	<td><?= (isset($inv_categories[$invoice['inv_category']]) && !empty($inv_categories[$invoice['inv_category']])) ? $inv_categories[$invoice['inv_category']] : "-"?></td>
			            	 	<td class="text-end"><?= displayNumber($basic) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_sgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_cgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_total) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds_sgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds_cgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($lbr_cess) ?></td>
			            	 	<td class="text-end"><?= displayNumber($other_ded) ?></td>
			            	 	<td class="text-end"><?= displayNumber($total_ded) ?></td>
			            	 	<td class="text-end"><?= displayNumber($g_total) ?></td>
			            	 	<td class="text-end"><?= displayNumber($total_received) ?></td>
			            	 	<td class="text-end"><?= displayNumber($balance_amt) ?></td>
			            	 </tr>
			            	 <?
				            	}
				            }
				            else { 
								?>
								<tr>
									<td class="alert alert-warning" colspan="18">No Records Found</td>
								</tr>
							<?
							}
							?>
			            </tbody>
			        </table>
				</div>
		  	</div>
		  	<div class="tab-pane fade" id="procurement" role="tabpanel" aria-labelledby="procurement-tab">
		  		<div class="table table-responsive mt-2">
			        <table class="table table-bordered table-hover table-striped table-condensed">
			            <thead>
			                <tr class="align-middle">
			                    <th rowspan="2" width="1%" class="text-center">S.No.</th>
			                    <th rowspan="2">Invoice No.</th>
			                    <th rowspan="2">Date</th>
			                    <th rowspan="2">Project</th>
			                    <!-- <th rowspan="2">Client</th> -->
			                    <th rowspan="2">Type</th>
			                    <th colspan="4" class="text-center">Invoice Value</th>
			                    <th colspan="6" class="text-center">Deductions</th>
			                    <th rowspan="2" class="text-end">Total</th>
			                    <th rowspan="2" class="text-end">Received</th>
			                    <th rowspan="2" class="text-end">Balance</th>
			                </tr>
			                <tr class="align-middle">
			                    <th class="text-end">Basic</th>
			                    <th class="text-end">SGST</th>
			                    <th class="text-end">CGST</th>
			                    <th class="text-end">Total</th>
			                    <th class="text-end">TDS</th>
			                    <th class="text-end" nowrap="">TDS-SGST</th>
			                    <th class="text-end" nowrap="">TDS-CGST</th>
			                    <th class="text-end" nowrap="">Labour Cess</th>
			                    <th class="text-end">Others</th>
			                    <th class="text-end">Total D</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?
							$i = 1;
							if (isset($invoices[2]) && !empty($invoices[2])) {
								foreach ($invoices[2] as $key => $invoice) { 
									$basic = (isset($invoice['basic']) && !empty($invoice['basic'])) ? $invoice['basic'] : 0;
									$basic_sgst = (isset($invoice['sgst']) && !empty($invoice['sgst'])) ? $invoice['sgst'] : 0;
									$basic_cgst = (isset($invoice['cgst']) && !empty($invoice['cgst'])) ? $invoice['cgst'] : 0;
									$basic_total = (isset($invoice['total']) && !empty($invoice['total'])) ? $invoice['total'] : 0;
									$tds = (isset($invoice['tds']) && !empty($invoice['tds'])) ? $invoice['tds'] : 0;
									$tds_sgst = (isset($invoice['tds_sgst']) && !empty($invoice['tds_sgst'])) ? $invoice['tds_sgst'] : 0;
									$tds_cgst = (isset($invoice['tds_cgst']) && !empty($invoice['tds_cgst'])) ? $invoice['tds_cgst'] : 0;
									$lbr_cess = (isset($invoice['labour_cess']) && !empty($invoice['labour_cess'])) ? $invoice['labour_cess'] : 0;
									$other_ded = (isset($invoice['other_deductions']) && !empty($invoice['other_deductions'])) ? $invoice['other_deductions'] : 0;
									$total_ded = $tds+$tds_sgst+$tds_cgst+$lbr_cess+$other_ded;
									$g_total = $basic_total - $total_ded;
									$total_received = (isset($invoice['total_received']) && !empty($invoice['total_received'])) ? $invoice['total_received'] : 0;
									$balance_amt = $g_total - $total_received;
			            	 ?>
			            	 <tr>
			            	 	<td><?= $i++ ?></td>
			            	 	<td><?= $invoice['inv_number'] ?></td>
			            	 	<td><?= displayDate($invoice['inv_date']) ?></td>
			            	 	<td><?= (isset($projects[$invoice['project_id']]) && !empty($projects[$invoice['project_id']])) ? $projects[$invoice['project_id']]['name'] : "-" ?></td>
			            	 	<!-- <td><?= $client['name'] ?></td> -->
			            	 	<td><?= (isset($inv_categories[$invoice['inv_category']]) && !empty($inv_categories[$invoice['inv_category']])) ? $inv_categories[$invoice['inv_category']] : "-"?></td>
			            	 	<td class="text-end"><?= displayNumber($basic) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_sgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_cgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_total) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds_sgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds_cgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($lbr_cess) ?></td>
			            	 	<td class="text-end"><?= displayNumber($other_ded) ?></td>
			            	 	<td class="text-end"><?= displayNumber($total_ded) ?></td>
			            	 	<td class="text-end"><?= displayNumber($g_total) ?></td>
			            	 	<td class="text-end"><?= displayNumber($total_received) ?></td>
			            	 	<td class="text-end"><?= displayNumber($balance_amt) ?></td>
			            	 </tr>
			            	 <?
				            	}
				            }
				            else { 
								?>
								<tr>
									<td class="alert alert-warning" colspan="18">No Records Found</td>
								</tr>
							<?
							}
							?>
			            </tbody>
			        </table>
				</div>
		  	</div>
		  	<div class="tab-pane fade" id="construction" role="tabpanel" aria-labelledby="construction-tab">
		  		<div class="table table-responsive mt-2">
			        <table class="table table-bordered table-hover table-striped table-condensed">
			            <thead>
			                <tr class="align-middle">
			                    <th rowspan="2" width="1%" class="text-center">S.No.</th>
			                    <th rowspan="2">Invoice No.</th>
			                    <th rowspan="2">Date</th>
			                    <th rowspan="2">Project</th>
			                    <!-- <th rowspan="2">Client</th> -->
			                    <th rowspan="2">Type</th>
			                    <th colspan="4" class="text-center">Invoice Value</th>
			                    <th colspan="6" class="text-center">Deductions</th>
			                    <th rowspan="2" class="text-end">Total</th>
			                    <th rowspan="2" class="text-end">Received</th>
			                    <th rowspan="2" class="text-end">Balance</th>
			                </tr>
			                <tr class="align-middle">
			                    <th class="text-end">Basic</th>
			                    <th class="text-end">SGST</th>
			                    <th class="text-end">CGST</th>
			                    <th class="text-end">Total</th>
			                    <th class="text-end">TDS</th>
			                    <th class="text-end" nowrap="">TDS-SGST</th>
			                    <th class="text-end" nowrap="">TDS-CGST</th>
			                    <th class="text-end" nowrap="">Labour Cess</th>
			                    <th class="text-end">Others</th>
			                    <th class="text-end">Total D</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?
							$i = 1;
							if (isset($invoices[3]) && !empty($invoices[3])) {
								foreach ($invoices[3] as $key => $invoice) { 
									$basic = (isset($invoice['basic']) && !empty($invoice['basic'])) ? $invoice['basic'] : 0;
									$basic_sgst = (isset($invoice['sgst']) && !empty($invoice['sgst'])) ? $invoice['sgst'] : 0;
									$basic_cgst = (isset($invoice['cgst']) && !empty($invoice['cgst'])) ? $invoice['cgst'] : 0;
									$basic_total = (isset($invoice['total']) && !empty($invoice['total'])) ? $invoice['total'] : 0;
									$tds = (isset($invoice['tds']) && !empty($invoice['tds'])) ? $invoice['tds'] : 0;
									$tds_sgst = (isset($invoice['tds_sgst']) && !empty($invoice['tds_sgst'])) ? $invoice['tds_sgst'] : 0;
									$tds_cgst = (isset($invoice['tds_cgst']) && !empty($invoice['tds_cgst'])) ? $invoice['tds_cgst'] : 0;
									$lbr_cess = (isset($invoice['labour_cess']) && !empty($invoice['labour_cess'])) ? $invoice['labour_cess'] : 0;
									$other_ded = (isset($invoice['other_deductions']) && !empty($invoice['other_deductions'])) ? $invoice['other_deductions'] : 0;
									$total_ded = $tds+$tds_sgst+$tds_cgst+$lbr_cess+$other_ded;
									$g_total = $basic_total - $total_ded;
									$total_received = (isset($invoice['total_received']) && !empty($invoice['total_received'])) ? $invoice['total_received'] : 0;
									$balance_amt = $g_total - $total_received;
			            	 ?>
			            	 <tr>
			            	 	<td><?= $i++ ?></td>
			            	 	<td><?= $invoice['inv_number'] ?></td>
			            	 	<td><?= displayDate($invoice['inv_date']) ?></td>
			            	 	<td><?= (isset($projects[$invoice['project_id']]) && !empty($projects[$invoice['project_id']])) ? $projects[$invoice['project_id']]['name'] : "-" ?></td>
			            	 	<!-- <td><?= $client['name'] ?></td> -->
			            	 	<td><?= (isset($inv_categories[$invoice['inv_category']]) && !empty($inv_categories[$invoice['inv_category']])) ? $inv_categories[$invoice['inv_category']] : "-"?></td>
			            	 	<td class="text-end"><?= displayNumber($basic) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_sgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_cgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($basic_total) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds_sgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($tds_cgst) ?></td>
			            	 	<td class="text-end"><?= displayNumber($lbr_cess) ?></td>
			            	 	<td class="text-end"><?= displayNumber($other_ded) ?></td>
			            	 	<td class="text-end"><?= displayNumber($total_ded) ?></td>
			            	 	<td class="text-end"><?= displayNumber($g_total) ?></td>
			            	 	<td class="text-end"><?= displayNumber($total_received) ?></td>
			            	 	<td class="text-end"><?= displayNumber($balance_amt) ?></td>
			            	 </tr>
			            	 <?
				            	}
				            }
				            else { 
								?>
								<tr>
									<td class="alert alert-warning" colspan="18">No Records Found</td>
								</tr>
							<?
							}
							?>
			            </tbody>
			        </table>
				</div>
		  	</div>
		</div>

	</div>
<?= 
$this->endsection();
?>