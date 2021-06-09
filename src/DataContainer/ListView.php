<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-monitoringsystemworker-bundle
 */

namespace Trilobit\MonitoringsystemworkerBundle\DataContainer;

use Contao\Backend;
use Contao\DataContainer;

class ListView extends Backend
{
    public function getLabel($row, $label, DataContainer $dc, $args)
    {
        if (isset($GLOBALS['TL_HOOKS']['monitoringFormatList']) && \is_array($GLOBALS['TL_HOOKS']['monitoringFormatList'])) {
            foreach ($GLOBALS['TL_HOOKS']['monitoringFormatList'] as $callback) {
                $this->import($callback[0]);
                $args = $this->{$callback[0]}->{$callback[1]}($row, $dc, $args);
            }
        }

        $index = array_search('customer', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            $row['customer'] = str_replace(' &#62; ', '<br>→ ', $row['customer']);
            $args[$index] = $row['customer'];
        }

        $index = array_search('last_test_date', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            $args[$index] = ''
            .\Contao\Date::parse('d.m.Y', $row['last_test_date']).'<br>→ '
            .\Contao\Date::parse('H:i', $row['last_test_date']).' Uhr<br>→ '
            .$row['last_test_response_time'].'s';
        }

        $index = array_search('last_test_status', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            $args[$index] = '<img src="bundles/trilobitmonitoringsystemworker/status_'.(!empty($row['last_test_status']) ? 'okay' : 'error').'.svg">';
        }

        $index = array_search('contaoMaintenance', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            $args[$index] = '<img src="bundles/trilobitmonitoringsystemworker/status_'.(empty($row['contaoMaintenance']) ? 'okay' : 'error').'.svg">';
        }

        $index = array_search('phpVersion', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            $args[$index] = preg_replace('/^(\d+)\.(\d+)\.(\d+).*/', '$1.$2.$3', $row['phpVersion']);
        }

        $index = array_search('googlemapsDlh', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            $args[$index] = '<img src="bundles/trilobitmonitoringsystemworker/status_'.strtolower('Ungetestet' === $row['googlemapsDlh'] ? 'error' : $row['googlemapsDlh']).'.svg" style="float:left"> ';
        }

        $index = array_search('googlemapsDlhApi', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            $args[$index] = '';

            $data = json_decode($row['googlemapsDlhApi'], true);

            $result = '';
            if (!empty($data)) {
                $args[$index] .= '<strong>Einstellungen</strong><br>→ '
                    .$data['apiConfig'].'<br>'
                    .'<strong>Seitenstruktur</strong>';
                foreach ($data['apiPage'] as $key => $value) {
                    $args[$index] .= '<br>→ '
                        .$value['dns'].' ('.$value['language'].')'.'<br>&nbsp;&nbsp;&nbsp;&nbsp;  → '
                        .$value['dlh_googlemaps_apikey'];
                }
            }
        }

        $index = array_search('certDatesOfExpiry', $GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'], true);
        if (false !== $index) {
            if (empty($row['certActive'])) {
                $args[$index] = '<img src="bundles/trilobitmonitoringsystemworker/status_unlocked.svg">';
            } elseif (empty($row['certDatesOfExpiry']) || 7 >= $row['certDatesOfExpiry']) {
                $args[$index] = '<img src="bundles/trilobitmonitoringsystemworker/status_lock_open.svg">'.' / '.$row['certDatesOfExpiry'].'d';
            } else {
                $args[$index] = '<img src="bundles/trilobitmonitoringsystemworker/status_lock_closed.svg">'.' / '.$row['certDatesOfExpiry'].'d';
            }
        }

        return $args;
    }
}
