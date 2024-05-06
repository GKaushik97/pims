<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */
$origin = array('1' => 'Internal', '2' => 'DEC');
define('ORIGIN', json_encode($origin));


function displayFile($file_name) {
	$substr = substr($file_name, -3);
	$icons = array(
		'pdf' => 'bi bi-filetype-pdf',
		'doc' => 'bi-file-word',
		'ocx' => 'bi-file-word',
		'png' => 'bi-file-image',
		'jpg' => 'bi-file-image',
		'peg' => 'bi-file-image',
	);
	if(in_array($icons[$substr], $icons)) { ?>
		<a href="<?= WEBROOT; ?>edms_docs/<? echo $file_name; ?>" target="_blank" title="<?= $file_name; ?>"><i class="<?= $icons[$substr]; ?>"></i></a>
	<? }else { ?>
		<a href="<?= WEBROOT; ?>edms_docs/<? echo $file_name; ?>" target="_blank" title="<?= $file_name; ?>"><i class="bi-file"></i></a>
	<? }
}?>