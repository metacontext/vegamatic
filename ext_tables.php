<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Weeks',
	'Weekly food planner'
);

//$pluginSignature = str_replace('_','',$_EXTKEY) . '_' . weeks;
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_' .weeks. '.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Veg-A-Matic');


t3lib_extMgm::addLLrefForTCAdescr('tx_vegamatic_domain_model_dishes', 'EXT:vegamatic/Resources/Private/Language/locallang_csh_tx_vegamatic_domain_model_dishes.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_vegamatic_domain_model_dishes');
$TCA['tx_vegamatic_domain_model_dishes'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_dishes',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Dishes.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_vegamatic_domain_model_dishes.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_vegamatic_domain_model_amounts', 'EXT:vegamatic/Resources/Private/Language/locallang_csh_tx_vegamatic_domain_model_amounts.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_vegamatic_domain_model_amounts');
$TCA['tx_vegamatic_domain_model_amounts'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_amounts',
		'label' => 'quantity',
		'label_alt' => 'unit,goods',
		'label_alt_force' => 1,
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Amounts.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_vegamatic_domain_model_amounts.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_vegamatic_domain_model_goods', 'EXT:vegamatic/Resources/Private/Language/locallang_csh_tx_vegamatic_domain_model_goods.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_vegamatic_domain_model_goods');
$TCA['tx_vegamatic_domain_model_goods'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_goods',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Goods.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_vegamatic_domain_model_goods.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_vegamatic_domain_model_weeks', 'EXT:vegamatic/Resources/Private/Language/locallang_csh_tx_vegamatic_domain_model_weeks.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_vegamatic_domain_model_weeks');
$TCA['tx_vegamatic_domain_model_weeks'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_weeks',
		'label' => 'weekstamp',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Weeks.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_vegamatic_domain_model_weeks.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_vegamatic_domain_model_shops', 'EXT:vegamatic/Resources/Private/Language/locallang_csh_tx_vegamatic_domain_model_shops.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_vegamatic_domain_model_shops');
$TCA['tx_vegamatic_domain_model_shops'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:vegamatic/Resources/Private/Language/locallang_db.xml:tx_vegamatic_domain_model_shops',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Shops.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_vegamatic_domain_model_shops.gif'
	),
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>