<?php
/**
 * @package PIMS
 * Disciplines
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('content'); ?>
<div id="discipline_body">
    <?= view('pims/disciplines/discipline_body'); ?>
</div>   
<? $this->endSection('content'); ?>