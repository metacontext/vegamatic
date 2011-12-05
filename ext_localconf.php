<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Planner',
	array(
		'Weeks' => 'list, show, new, create, edit, update, delete, excludeAmount, includeAmount, modifyAmount, addAmount, createAmount, updateAmount, addDish, removeDish',
		'Dishes' => 'list, show, new, create, edit, update, delete',
		'Goods' => 'list, new, create, edit, update, delete',
		'Amounts' => 'new'		
	),
	// non-cacheable actions
	array(
		'Weeks' => 'create, update, delete',
		'Dishes' => 'create, update, delete',
		'Goods' => 'create, update, delete',
		'Amounts' => 'new'	
	)
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>