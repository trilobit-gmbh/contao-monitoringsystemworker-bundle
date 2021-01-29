<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-monitoringsystemworker-bundle
 */

namespace Trilobit\MonitoringsystemworkerBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Trilobit\MonitoringsystemworkerBundle\TrilobitMonitoringsystemworkerBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(TrilobitMonitoringsystemworkerBundle::class)
                ->setLoadAfter([
                    'Monitoring',
                    'MonitoringClient',
                    'MonitoringClientSensorContao',
                    'MonitoringScanClientWorker',
                    'MonitoringScanClientWorkerUpdateContaoVersion',
                    ContaoCoreBundle::class,
                ]),
        ];
    }
}
