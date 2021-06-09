<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-monitoringsystemworker-bundle
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Monitoring\Monitoring;
use Trilobit\MonitoringsystemworkerBundle\DataContainer\ListView;

$GLOBALS['TL_DCA']['tl_monitoring']['subpalettes']['certActive'] = '';
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['__selector__'][] = 'certActive';

PaletteManipulator::create()
    ->addLegend('contao_legend', 'last_test_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['contaoVersion', 'contaoMaintenance'], 'contao_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('googlemaps_legend', 'contao_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['googlemapsDlh', 'googlemapsDlhCount', 'googlemapsDlhApi'], 'googlemaps_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('php_legend', 'googlemaps_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['phpVersion', 'phpMemoryLimit', 'phpMaxExecutionTime', 'phpMaxPostSize', 'phpMaxUploadFilesize'], 'php_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('server_legend', 'php_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['serverOs', 'serverSoftware'], 'server_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('sql_legend', 'server_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['sqlVersion'], 'sql_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('disk_legend', 'sql_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['diskTotal', 'diskFree', 'diskUsage'], 'disk_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('quota_legend', 'disk_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['quotaUsage'], 'quota_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('cert_legend', 'quota_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['certActive'], 'cert_legend', PaletteManipulator::POSITION_APPEND)

    ->applyToPalette('default', 'tl_monitoring')
;

PaletteManipulator::create()
    ->addField(['certExhibitorsCn', 'certDateOfExpiry', 'certDatesOfExpiry', 'certFingerprintSHA256'], 'cert_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToSubpalette('certActive', 'tl_monitoring')
;

$GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'] = ['customer', 'website', 'last_test_status', 'last_test_date', 'googlemapsDlh', 'googlemapsDlhApi', 'certDatesOfExpiry', 'contaoVersion', 'contaoMaintenance', 'phpVersion', 'quotaUsage'];
$GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['label_callback'] = [ListView::class, 'getLabel'];

$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['tests']['icon'] = 'bundles/trilobitmonitoringsystemworker/operation_tests.svg';
$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['checkOne']['icon'] = 'bundles/trilobitmonitoringsystemworker/operation_check_one.svg';
$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['scanClientWorkOffOne']['icon'] = 'bundles/trilobitmonitoringsystemworker/operation_scanclient_workoff_one.svg';
$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['certCheck']['icon'] = 'bundles/trilobitmonitoringsystemworker/operation_cert_check_one.svg';

$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['checkAll']['icon'] = 'bundles/trilobitmonitoringsystemworker/global_operation_check_all.svg';
$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['compressAll']['icon'] = 'bundles/trilobitmonitoringsystemworker/file-archive-regular.svg';
$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['scanClientWorkOffAll']['icon'] = 'bundles/trilobitmonitoringsystemworker/operation_scanclient_workoff_one.svg';
$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['navigateToMonitoringResponseTimeGraph']['icon'] = 'bundles/trilobitmonitoringsystemworker/chart-bar-regular.svg';
$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['navigateToMonitoringTimeline']['icon'] = 'bundles/trilobitmonitoringsystemworker/chart-line-solid.svg';

$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['certChecks'] = [
    'href' => 'key=checkCerts',
    'class' => 'header_icon',
    'icon' => 'bundles/trilobitmonitoringsystemworker/global_operations_cert_check_all.svg',
];

$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations'] = [
    'checkAll' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['checkAll'],
    'certChecks' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['certChecks'],
    'compressAll' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['compressAll'],
    'scanClientWorkOffAll' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['scanClientWorkOffAll'],
    // 'navigateToMonitoringResponseTimeGraph' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['navigateToMonitoringResponseTimeGraph'],
    // 'navigateToMonitoringTimeline' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['navigateToMonitoringTimeline'],
    'all' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['all'],
];

$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['certCheck'] = [
    'href' => 'key=checkCert',
    'class' => 'header_icon',
    'icon' => 'bundles/trilobitmonitoringsystemworker/operation_cert_check_one.svg',
];

$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations'] = [
    'tests' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['tests'],
    'checkOne' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['checkOne'],
    'scanClientWorkOffOne' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['scanClientWorkOffOne'],
    'certCheck' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['certCheck'],
    'edit' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['edit'],
    'copy' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['copy'],
    'delete' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['delete'],
    'toggle' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['toggle'],
    'show' => $GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['show'],
];

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['contaoVersion'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['contaoMaintenance'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['phpVersion'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['phpMemoryLimit'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['phpMaxExecutionTime'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['phpMaxPostSize'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['phpMaxUploadFilesize'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['serverOs'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['serverSoftware'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['sqlVersion'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['diskTotal'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['diskFree'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['diskUsage'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['quotaUsage'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['certActive'] = [
    'exclude' => true,
    'filter' => true,
    'inputType' => 'checkbox',
    'eval' => ['submitOnChange' => true, 'tl_class' => 'clr', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['certExhibitorsCn'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 128, 'readonly' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['certDateOfExpiry'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 128, 'readonly' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['certDatesOfExpiry'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 128, 'readonly' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['certFingerprintSHA256'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 128, 'readonly' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(128) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['googlemapsDlh'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'select',
    'default' => Monitoring::STATUS_UNTESTED,
    'options' => [Monitoring::STATUS_UNTESTED, Monitoring::STATUS_OKAY, Monitoring::STATUS_ERROR],
    'reference' => &$GLOBALS['TL_LANG']['tl_monitoring']['statusTypes'],
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'helpwizard' => true, 'doNotCopy' => true],
    'sql' => "varchar(64) NOT NULL default '".Monitoring::STATUS_UNTESTED."'",
];

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['googlemapsDlhCount'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'readonly' => true, 'doNotCopy' => true],
    'sql' => "int(5) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['googlemapsDlhApi'] = [
    'exclude' => true,
    'search' => true,
    'filter' => true,
    'sorting' => true,
    'inputType' => 'textarea',
    'eval' => ['tl_class' => 'clr', 'class' => 'monospace', 'rte' => 'ace|html', 'readonly' => true, 'doNotCopy' => true],
    'sql' => 'mediumtext NULL',
];

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['client_token']['eval']['mandatory'] = false;
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['id']['sorting'] = true;
