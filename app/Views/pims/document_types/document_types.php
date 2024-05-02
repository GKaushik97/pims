<?php
/**
 * @package Pims 
 * Document Types
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('content'); ?>
<div id="document_type_body">
    <?= view('pims/document_types/document_type_body'); ?>
</div>   
<? $this->endSection('content'); ?>