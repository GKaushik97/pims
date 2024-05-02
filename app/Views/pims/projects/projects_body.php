<?php
/**
 * vendor_body
 * Table List
 */
$keywords = isset($params['keywords']) ? $params['keywords'] : '';
$pageno = isset($params['pageno']) ? $params['pageno'] : '';
$sort_by = isset($params['sort_by']) ? $params['sort_by'] : '';
$sort_order = isset($params['sort_order']) ? $params['sort_order'] : '';
$tRecords = $tRecords;
$sort_order_alt = $sort_order == 'asc' ? 'desc' : 'asc';
$rows = isset($params['rows']) ? $params['rows'] : '';
$name_val = isset($_POST['name']) ? $_POST['name'] : '';
$code_val = isset($_POST['code']) ? $_POST['code'] : '';
$client_id_val = isset($_POST['client_id']) ? $_POST['client_id'] : '';
$vendor_id_val = isset($_POST['vendor_id']) ? $_POST['vendor_id'] : '';
$pmc_val = isset($_POST['pmc']) ? $_POST['pmc'] : '';
$epc_val = isset($_POST['epc']) ? $_POST['epc'] : '';
$start_date_val = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date_val = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$manager_val = isset($_POST['manager']) ? $_POST['manager']: '';


?>
<div class="clearfix">
    <div class="float-start">
        <div class="row gx-1 align-items-center">
            <div class="col-auto">
                <input class="form-control form-control-sm me-1" type="text" id="keywords" name="keywords" value="<?= $keywords; ?>" placeholder="Search here...">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-success"  name="search" id="search" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-sm btn-warning" name="search" id="reset" onclick="resetProjectBody()"><i class="bi bi-arrow-clockwise"></i></button>
            </div>
            <div class="col-auto">
                <strong>(<?= $tRecords; ?> Records)</strong>
            </div>
        </div>
    </div>
    <div class="float-end">
        <button class="btn btn-success btn-sm" onclick="addProject()"><i class="bi bi-plus-square"></i>&nbsp;Add Project</button>
    </div>
</div>
<div class="table-responsive mt-2">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%" class="text-center">S.No.</th>
                
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.code', '<?= $sort_order_alt; ?>')"> Code
                            <?php if($sort_by == 'projects.code') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.name', '<?= $sort_order_alt; ?>')"> Name
                        <?php if($sort_by == 'projects.name') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.client_id', '<?= $sort_order_alt; ?>')"> Client
                            <?php if($sort_by == 'projects.client_id') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.vendor_id', '<?= $sort_order_alt; ?>')"> Vendor
                            <?php if($sort_by == 'projects.vendor_id') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.manager', '<?= $sort_order_alt; ?>')"> Manager
                            <?php if($sort_by == 'projects.manager') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.pmc', '<?= $sort_order_alt; ?>')"> Pmc
                            <?php if($sort_by == 'projects.pmc') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                 <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.epc', '<?= $sort_order_alt; ?>')">Epc
                            <?php if($sort_by == 'projects.epc') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.start_date', '<?= $sort_order_alt; ?>')"> Start date
                            <?php if($sort_by == 'projects.start_date') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>
                    <a href="javascript:void(0)" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', 'projects.end_date', '<?= $sort_order_alt; ?>')"> End Date
                            <?php if($sort_by == 'projects.end_Date') { echo ($sort_order == 'asc') ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';} ?>
                    </a>
                </th>
                <th>Actions</th>
            </tr>            
        </thead>
        <tbody>
            <tr>
                <td class="text-center">
                    #
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="code" id="code_val" value="<?= $code_val; ?>" placeholder=" Code ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="name" id="name_val" value="<?= $name_val; ?>" placeholder=" Project Name ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="Client_id" id="client_id_val" value="<?= $client_id_val; ?>" placeholder=" Client ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="vendor_id" id="vendor_id_val" value="<?= $vendor_id_val; ?>" placeholder=" Vendor ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="Manager" id="manager_val" value="<?= $manager_val; ?>" placeholder=" Manager ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="pmc" id="pmc_val" value="<?= $pmc_val; ?>" placeholder=" Pmc ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="epc" id="epc_val" value="<?= $epc_val; ?>" placeholder=" Epc ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="start_date" id="start_date_val" value="<?= $start_date_val; ?>" placeholder=" Start Date ">
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="end_Date" id="end_date_val" value="<?= $end_date_val; ?>" placeholder=" End Date ">
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-success" name="search" id="search" onclick="projectBody('<?= $rows; ?>', '<?= $pageno; ?>', '<?= $sort_by; ?>', '<?= $sort_order; ?>')"><i class="bi bi-search"></i>
                    </button>

                    <button class="btn btn-sm btn-warning" onclick="resetProjectBody()"><i class="bi bi-arrow-clockwise"></i></button>
                </td>
            </tr>
        <?php
            $i = $params['rows'] * ($params['pageno'] - 1) + 1;
            foreach ($projects as $project) :
        ?>
        <tr>
            <td class="text-center"><?= $i++; ?></td>
            <td><?= $project['code']; ?></td>
            <td><?= $project['name']; ?></td>
            <td><?= $project['client_name']; ?></td>
            <td><?= $project['vendor_name']; ?></td>
            <td nowrap><?= $project['manager']; ?></td>            
            <td><?= $project['pmc']; ?></td>
            <td><?= $project['epc']; ?></td>
            <td nowrap><?= displayDate($project['start_date']); ?></td>
            <td nowrap><?= displayDate($project['end_date']); ?></td>
            <td nowrap>
                <button class="btn btn-sm btn-primary" onclick="editProject(<?= $project['id']; ?>)"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteProject(<?= $project['id']; ?>)"><i class="bi bi-trash"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($projects)){?>
            <tr>
                <td colspan="11" class="bg bg-warning">No Records Found</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Datepicker Initialization Script -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#start_date_val').datepicker({ format: 'dd-mm-yyyy',  autoHide: true });
        $('#end_date_val').datepicker({ format: 'dd-mm-yyyy', endDate: 'today', autoHide: true });
        // $('.selectpicker').selectpicker({
        //     placeholder: "Select"
        // });
    });
    /*$(function () {
        $('.selectpicker').selectpicker();
    });*/
</script>
