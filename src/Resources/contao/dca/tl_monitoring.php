<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-monitoringsystemworker-bundle
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_monitoring']['subpalettes']['certActive'] = '';
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['__selector__'][] = 'certActive';

PaletteManipulator::create()
    ->addLegend('contao_legend', 'last_test_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(['contaoVersion', 'contaoMaintenance'], 'contao_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('php_legend', 'contao_legend', PaletteManipulator::POSITION_AFTER)
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

$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['certChecks'] = [
    'href' => 'key=checkCerts',
    'class' => 'header_icon',
    'icon' => 'sync.svg',
];

$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['certCheck'] = [
    'href' => 'key=checkCert',
    'class' => 'header_icon',
    'icon' => 'sync.svg',
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
