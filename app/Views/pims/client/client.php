<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>
<div id="client_body">
	<?= $this->include('pims/client/client_body');	?>
</div>
<?= 
$this->endsection();
?>