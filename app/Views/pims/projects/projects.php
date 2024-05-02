<?php
/**
 * Projects View
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('content'); ?>
<div id="projects_body">
    <?= view('pims/projects/projects_body'); ?>
</div>   
<? $this->endSection('content'); ?>