<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_vegamatic_domain_model_amounts'] = array(
	'ctrl' => $TCA['tx_vegamatic_domain_model_amounts']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, quantity, unit, goods',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, quantity, unit, goods,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_vegamatic_domain_model_amounts',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_amounts.pid=###CURRENT_PID### AND tx_vegamatic_domain_model_amounts.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'quantity' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_amounts.quantity',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'unit' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_amounts.unit',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
					array('g', 1),
					array('ml', 2),
					array('EL', 3),
					array('TL', 4),					
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'goods' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_amounts.goods',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_goods',
				'minitems' => 0,
				'maxitems' => 1,
				'wizards' => Array(
					'_PADDING' => 2,
					'_VERTICAL' => 1,
					'add' => Array(
						'type' => 'popup',
						'JSopenParams' => 'height=550,width=900,status=0,menubar=0,scrollbars=1',				
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => Array(
							'table'=>'tx_vegamatic_domain_model_goods',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
						'script' => 'wizard_add.php',
					),
					'edit' => Array(
						'type' => 'popup',
						'title' => 'LLL:EXT:hisodat/Resources/Private/Language/locallang_db.xml:tx_hisodat_tca_wizards.edit',
						'icon' => 'edit2.gif',
						'JSopenParams' => 'height=550,width=900,status=0,menubar=0,scrollbars=1',
						'popup_onlyOpenIfSelected' => 1,
						'script' => 'wizard_edit.php',
					),					
				),		
			),
		),
		'dishes' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'weeks' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>