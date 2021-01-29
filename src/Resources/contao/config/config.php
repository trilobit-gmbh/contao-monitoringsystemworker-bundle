<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-monitoringsystemworker-bundle
 */

use Trilobit\MonitoringsystemworkerBundle\Controller\MonitoringSystem;

$GLOBALS['TL_HOOKS']['monitoringScanClientWork']['MonitoringClientWorkerSystem'] = [MonitoringSystem::class, 'updateData'];

$GLOBALS['BE_MOD']['ContaoMonitoring']['monitoring']['checkCert'] = [MonitoringSystem::class, 'checkCert'];
$GLOBALS['BE_MOD']['ContaoMonitoring']['monitoring']['checkCerts'] = [MonitoringSystem::class, 'checkCerts'];

$GLOBALS['TL_CRON']['daily']['MonitoringCerts'] = [MonitoringSystem::class, 'checkCerts'];
