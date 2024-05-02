<?= $this->extend('template/template_admin'); ?>
<?= $this->section('content'); ?>
<div id="document_body">
	<?= $this->include('pims/DocumentPurpose/document_body');	?>
</div>
<?= 
$this->endsection('content');
?>