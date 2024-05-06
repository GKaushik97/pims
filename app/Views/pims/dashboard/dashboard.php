<?php
/**
 * Invoice tracking
 * Dashboard
 */
?>
<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>
	<div class="page-card-header d-flex justify-content-between align-items-center mb-3 mt-3 pt-1 pb-1">
        <div class="page-title"><h4>Dashboard</h4></div>
        <nav aria-label="breadcrumb" class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="db-col-padding">
	    <h4 class="title">Counts</h4>
	    <div class="row">
	    	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Total Projects</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Total Disciplines</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
	    	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Total Cleints</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Total Vendors</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>		
	    </div>
	    <h4 class="title">Projects Data</h4>
	    <div class="row">
	    	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Internal Pending</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Internal Completed</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Client Pending</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Clent Completed</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="db-card mb-3">
					<div class="db-card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div class="db-content">
								<h4>4</h4>
								<h6>Total</h6>
							</div>
							<div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
								<img src="./img/dashboard/employees.png" alt="dashboard icon" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
    <style type="text/css">
    	.db-card {
    		/*box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;*/
    		/*border: 1px solid rgba(255, 136, 217, 0.18);*/
    		box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
			border-radius: 1rem;
			background-color: #ffffff;

    	}
    	.db-card-body {
    		flex: 1 1 auto;
    		padding: 1.25rem;
    	}
    	.icon-shape {
			width: 55px;
			height: 55px;
			background-position: 50%;
			border-radius: .75rem;
			padding: 6px;
		}
		.bg-gradient-primary {
		  	background-image: linear-gradient(310deg,#0b10ff, #fb2a31);
		}
		.text-center {
		  	text-align: center !important;
		}
		.shadow {
		  	box-shadow: 0 .3125rem .625rem 0 rgba(0,0,0,.12) !important;
		}
		.icon {
			fill: currentColor;
			stroke: none;
		}
		.icon {
			display: inline-block;
			color: #111;
		}
		h4.title {
			padding: 12px;
			color: #535353;
			letter-spacing: 1px;
			margin: 0px;
			border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
			background-color: #ffffff !important;
			border-width: 3px 0 3px 3px;
			border-style: solid;
			-webkit-border-image: -webkit-gradient(linear, 0 0, 0 100%, from(black), to(rgba(0, 0, 0, 0))) 1 100%;
			-webkit-border-image: -webkit-linear-gradient(black, rgba(0, 0, 0, 0)) 1 100%;
			-moz-border-image: -moz-linear-gradient(black, rgba(0, 0, 0, 0)) 1 100%;
			-o-border-image: -o-linear-gradient(black, rgba(0, 0, 0, 0)) 1 100%;
			border-image: linear-gradient(to bottom, #ee1e25, rgb(50, 52, 148)) 1 100%;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
			margin-top: 0.5rem;
  			margin-bottom: 0.5rem;
		}
		.db-content h6 {
			font-size: 0.95rem;
			margin-bottom: 0px;
			color: #535353;
		}
		.db-content h4 {
			color: #535353;
			font-size: 1.5rem;
  			margin-bottom: 0.75rem;
		}
		.db-col-padding [class*= 'col-'] {
			padding: 0.75rem;
		}
    </style>
<?= $this->endSection() ?>