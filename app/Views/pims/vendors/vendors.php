<?php
/**
 * Vendors View
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('content'); ?>
<div id="vendor_body">
    <?= view('pims/vendors/vendor_body'); ?>
</div>   
<? $this->endSection('content'); ?>