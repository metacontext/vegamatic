<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Weeks',
	array(
		'Weeks' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Weeks' => 'create, update, delete',
		
	)
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>