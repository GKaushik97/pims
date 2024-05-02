<?php
/**
 * Document Revisions View
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('content'); ?>
<div id="documentRevisions_body">
    <?= view('pims/documentRevisions/documentRevisions_body'); ?>
</div>   
<? $this->endSection('content'); ?>