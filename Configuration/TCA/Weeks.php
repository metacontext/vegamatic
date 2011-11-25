<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_vegamatic_domain_model_weeks'] = array(
	'ctrl' => $TCA['tx_vegamatic_domain_model_weeks']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, weekstamp, maindish1, maindish2, maindish3, maindish4, maindish5, maindish6, maindish7, sidedish1, sidedish2, sidedish3, sidedish4, sidedish5, sidedish6, sidedish7, overlay_amounts, additional_amounts',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, weekstamp, maindish1, maindish2, maindish3, maindish4, maindish5, maindish6, maindish7, sidedish1, sidedish2, sidedish3, sidedish4, sidedish5, sidedish6, sidedish7, overlay_amounts, additional_amounts, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_vegamatic_domain_model_weeks',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_weeks.pid=###CURRENT_PID### AND tx_vegamatic_domain_model_weeks.sys_language_uid IN (-1,0)',
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
		'weekstamp' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.weekstamp',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime,required',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'maindish1' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish1',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=1',
				'items' =>	array(array('', 0)),		
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'maindish2' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish2',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=1',
				'items' =>	array(array('', 0)),		
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'maindish3' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish3',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=1',
				'items' =>	array(array('', 0)),		
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'maindish4' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish4',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=1',
				'items' =>	array(array('', 0)),		
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'maindish5' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish5',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=1',
				'items' =>	array(array('', 0)),		
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'maindish6' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish6',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=1',
				'items' =>	array(array('', 0)),		
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'maindish7' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish7',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=1',
				'items' =>	array(array('', 0)),		
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sidedish1' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish1',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=2',
				'items' =>	array(array('', 0)),		
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sidedish2' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish2',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=2',
				'items' =>	array(array('', 0)),			
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sidedish3' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish3',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=2',
				'items' =>	array(array('', 0)),			
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sidedish4' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish4',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=2',
				'items' =>	array(array('', 0)),		
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sidedish5' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish5',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=2',
				'items' =>	array(array('', 0)),			
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sidedish6' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish6',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=2',
				'items' =>	array(array('', 0)),		
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sidedish7' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish7',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_table_where' => 'AND tx_vegamatic_domain_model_dishes.type=2',
				'items' =>	array(array('', 0)),			
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'overlay_amounts' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.overlay_amounts',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_vegamatic_domain_model_amounts',
				'foreign_field' => 'overlay',
				'minitems' => 0,
				'maxitems' => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),						
		'additional_amounts' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.additional_amounts',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_vegamatic_domain_model_amounts',
				'foreign_field' => 'week',
				'minitems' => 0,
				'maxitems' => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>