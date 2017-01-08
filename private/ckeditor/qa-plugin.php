<?php
/*
	Plugin Name: CKEditor4
	Plugin URI: 
	Plugin Description: Wrapper for CKEditor4 WYSIWYG rich text editor
	Plugin Version: 1.0.1
	Plugin Date: 2013-09-29
	Plugin Author: sama55@CMSBOX
	Plugin Author URI: http://www.cmsbox.jp/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5.1
	Plugin Update Check URI: 
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

qa_register_plugin_module('editor', 'qa-ckeditor4.php', 'qa_ckeditor4', 'CKEditor4');
qa_register_plugin_module('page', 'qa-ckeditor4-upload.php', 'qa_ckeditor4_upload', 'CKEditor4 Upload');

/*
	Omit PHP closing tag to help avoid accidental output
*/