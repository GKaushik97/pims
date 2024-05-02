<?php
/**
 * Document Status View Page 
 */
?>
<?= $this->extend('template/template_admin'); ?>

<?= $this->section('content'); ?>

<div id="document_status_body">
	<?= view('pims/document_status/document_status_body'); ?>
</div>
<?= $this->endSection(); ?>

