<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_vegamatic_domain_model_weeks'] = array(
	'ctrl' => $TCA['tx_vegamatic_domain_model_weeks']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, weekstamp, maindish, sidedish, amounts',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, weekstamp, maindish, sidedish, amounts,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
		'maindish' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.maindish',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_field' => 'weeks',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'sidedish' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.sidedish',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_vegamatic_domain_model_dishes',
				'foreign_field' => 'weeks',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'amounts' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks.amounts',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_vegamatic_domain_model_amounts',
				'foreign_field' => 'weeks',
				'maxitems'      => 9999,
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
?>