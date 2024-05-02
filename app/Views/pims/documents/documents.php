<?php
/**
 * Vendors View
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('content'); ?>
<div id="documents_body">
    <?= view('pims/documents/documents_body'); ?>
</div>   
<? $this->endSection('content'); ?>