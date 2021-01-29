<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-monitoringsystemworker-bundle
 */

namespace Trilobit\MonitoringsystemworkerBundle\Controller;

use Contao\Backend;
use Contao\Environment;
use Contao\Input;
use Contao\System;
use Contao\Versions;
use Monitoring\MonitoringModel;
use Spatie\SslCertificate\SslCertificate;

/**
 * Class MonitoringDiskusage.
 */
class MonitoringSystem extends Backend
{
    /**
     * MonitoringDiskusage constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function checkCerts()
    {
        $item = MonitoringModel::findAllActive();

        while ($item->next()) {
            $this->checkCert($item->id, true);
        }

        $this->returnToList(Input::get('do'));
    }

    /**
     * @param int   $id
     * @param false $checkAllCerts
     */
    public function checkCert($id = 0, $checkAllCerts = false)
    {
        if (!empty(Input::get('id'))) {
            $id = Input::get('id');
        }

        $item = MonitoringModel::findActiveById($id);
        $this->updateData($item, null, true);

        if ($checkAllCerts) {
            return;
        }

        $urlParam = Input::get('do');

        if ('tl_monitoring_test' === Input::get('table') && $id) {
            $urlParam .= '&table=tl_monitoring_test&id='.$id;
        }

        $this->returnToList($urlParam);
    }

    /**
     * @param $item
     * @param $response
     * @param mixed $certOnly
     */
    public function updateData($item, $response = null, $certOnly = false)
    {
        $this->import('BackendUser', 'User');

        $objVersions = new Versions('tl_monitoring', $item->id);

        $objVersions->initialize();

        // for CRON based execution we need to set a system user
        if (empty($this->User->id) || empty($this->User->username)) {
            $objVersions->setUserId(0);
            $objVersions->setUsername('ContaoMonitoringSystem');
        }

        $item->certActive = '';
        if ('https' === parse_url($item->url, \PHP_URL_SCHEME)) {
            $url = parse_url($item->url, \PHP_URL_SCHEME)
                .'://'
                .parse_url($item->url, \PHP_URL_HOST)
            ;

            $certificate = SslCertificate::createForHostName($url);
            $item->certExhibitorsCn = $certificate->getIssuer();
            $item->certDateOfExpiry = $certificate->expirationDate()->toRfc2822String();
            $item->certDatesOfExpiry = $certificate->expirationDate()->diffInDays();
            $item->certFingerprintSHA256 = $certificate->getFingerprint();
            $item->certActive = '1';
        }

        if ($certOnly) {
            $item->save();

            $objVersions->create();

            return $item;
        }

        if (\in_array('MonitoringClientSensorSystem', explode(', ', $response['monitoring.client.sensors']), true)) {
            if (!empty($response['contao.version'])) {
                $item->contaoVersion = $response['contao.version'];
            }
            if (!empty($response['contao.maintenance'])) {
                $item->contaoMaintenance = 'true' === $response['contao.maintenance'] ? '1' : '';
            }

            if (!empty($response['php.version'])) {
                $item->phpVersion = $response['php.version'];
            }
            if (!empty($response['php.memory_limit'])) {
                $item->phpMemoryLimit = $response['php.memory_limit'];
            }
            if (!empty($response['php.max_execution_time'])) {
                $item->phpMaxExecutionTime = $response['php.max_execution_time'];
            }
            if (!empty($response['php.post_max_size'])) {
                $item->phpMaxPostSize = $response['php.post_max_size'];
            }
            if (!empty($response['php.upload_max_filesize'])) {
                $item->phpMaxUploadFilesize = $response['php.upload_max_filesize'];
            }

            if (!empty($response['server.os'])) {
                $item->serverOs = $response['server.os'];
            }
            if (!empty($response['server.software'])) {
                $item->serverSoftware = $response['server.software'];
            }

            if (!empty($response['sql.version'])) {
                $item->sqlVersion = $response['sql.version'];
            }

            if (!empty($response['disk.total'])) {
                $item->diskTotal = System::getReadableSize($response['disk.total'], 2);
            }
            if (!empty($response['disk.free'])) {
                $item->diskFree = System::getReadableSize($response['disk.free'], 2);
            }
            if (!empty($response['disk.usage'])) {
                $item->diskUsage = System::getReadableSize($response['disk.usage'], 2);
            }

            if (!empty($response['quota.usage'])) {
                $item->quotaUsage = System::getReadableSize($response['quota.usage'], 2);
            }
        }

        $item->save();

        $objVersions->create();
    }

    /**
     * @param $act
     */
    private function returnToList($act)
    {
        $path = Environment::get('base').'contao/main.php?do='.$act;
        $this->redirect($path, 301);
    }
}
