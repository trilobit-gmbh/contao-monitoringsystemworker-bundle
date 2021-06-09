<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-monitoringsystemworker-bundle
 */

/*
 * Legends
 */
$GLOBALS['TL_LANG']['tl_monitoring']['quota_legend'] = 'Quota';
$GLOBALS['TL_LANG']['tl_monitoring']['disk_legend'] = 'Disk';
$GLOBALS['TL_LANG']['tl_monitoring']['sql_legend'] = 'SQL';
$GLOBALS['TL_LANG']['tl_monitoring']['server_legend'] = 'Server';
$GLOBALS['TL_LANG']['tl_monitoring']['php_legend'] = 'PHP';
$GLOBALS['TL_LANG']['tl_monitoring']['contao_legend'] = 'Contao';

/*
 * Fields
 */
$GLOBALS['TL_LANG']['tl_monitoring']['quotaUsage'][0] = 'Belegte Quota';
$GLOBALS['TL_LANG']['tl_monitoring']['quotaUsage'][1] = 'Belegte Quota.';

$GLOBALS['TL_LANG']['tl_monitoring']['diskTotal'][0] = 'Disk insgesamt';
$GLOBALS['TL_LANG']['tl_monitoring']['diskTotal'][1] = 'Disk insgesamt';
$GLOBALS['TL_LANG']['tl_monitoring']['diskFree'][0] = 'Disk frei';
$GLOBALS['TL_LANG']['tl_monitoring']['diskFree'][1] = 'Disk frei';
$GLOBALS['TL_LANG']['tl_monitoring']['diskUsage'][0] = 'Disk belegt';
$GLOBALS['TL_LANG']['tl_monitoring']['diskUsage'][1] = 'Disk belegt';
$GLOBALS['TL_LANG']['tl_monitoring']['sqlVersion'][0] = 'SQL Version';
$GLOBALS['TL_LANG']['tl_monitoring']['sqlVersion'][1] = 'SQL Version';
$GLOBALS['TL_LANG']['tl_monitoring']['serverOs'][0] = 'Betriebssystem';
$GLOBALS['TL_LANG']['tl_monitoring']['serverOs'][1] = 'Betriebssystem';
$GLOBALS['TL_LANG']['tl_monitoring']['serverSoftware'][0] = 'Webserver';
$GLOBALS['TL_LANG']['tl_monitoring']['serverSoftware'][1] = 'Webserver';
$GLOBALS['TL_LANG']['tl_monitoring']['phpVersion'][0] = 'PHP Version';
$GLOBALS['TL_LANG']['tl_monitoring']['phpVersion'][1] = 'PHP Version';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMemoryLimit'][0] = 'Speicherlimit';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMemoryLimit'][1] = 'Speicherlimit';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMaxExecutionTime'][0] = 'Maximale Ausführungszeit';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMaxExecutionTime'][1] = 'Maximale Ausführungszeit';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMaxPostSize'][0] = 'Maximale Post-Größe';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMaxPostSize'][1] = 'Maximale Post-Größe';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMaxUploadFilesize'][0] = 'Maximale Upload-Größe';
$GLOBALS['TL_LANG']['tl_monitoring']['phpMaxUploadFilesize'][1] = 'Maximale Upload-Größe';
$GLOBALS['TL_LANG']['tl_monitoring']['contaoVersion'][0] = 'Contao-Version';
$GLOBALS['TL_LANG']['tl_monitoring']['contaoVersion'][1] = 'Contao-Version';
$GLOBALS['TL_LANG']['tl_monitoring']['contaoMaintenance'][0] = 'Wartungsmodus';
$GLOBALS['TL_LANG']['tl_monitoring']['contaoMaintenance'][1] = 'Wartungsmodus';

$GLOBALS['TL_LANG']['tl_monitoring']['certDateOfExpiry'][0] = 'Gültig bis';
$GLOBALS['TL_LANG']['tl_monitoring']['certDateOfExpiry'][1] = 'Das Datum der Gültigkeit des Zertifikates nach RFC 2822.';
$GLOBALS['TL_LANG']['tl_monitoring']['certDatesOfExpiry'][0] = 'Gültigkeit in Tagen';
$GLOBALS['TL_LANG']['tl_monitoring']['certDatesOfExpiry'][1] = 'Gültigkeit des Zertifikates in Tagen';
$GLOBALS['TL_LANG']['tl_monitoring']['certExhibitorsCn'][0] = 'Antragssteller';
$GLOBALS['TL_LANG']['tl_monitoring']['certExhibitorsCn'][1] = 'Allgemeiner Name des Antragsstellers (CN)';
$GLOBALS['TL_LANG']['tl_monitoring']['certFingerprintSHA256'][0] = 'SHA-256-Fingerabdruck';
$GLOBALS['TL_LANG']['tl_monitoring']['certFingerprintSHA256'][1] = 'Fingerabdruck des Zertifikates';
$GLOBALS['TL_LANG']['tl_monitoring']['certActive'][0] = 'Zertifikatsprüfung';
$GLOBALS['TL_LANG']['tl_monitoring']['certActive'][1] = 'Das System konnte ein Zertifikat finden.';

$GLOBALS['TL_LANG']['tl_monitoring']['checkAll'][0] = 'Alle Einträge prüfen';
$GLOBALS['TL_LANG']['tl_monitoring']['checkAll'][1] = 'Alle <u>aktiven</u> Monitoring Einträge prüfen.';
$GLOBALS['TL_LANG']['tl_monitoring']['certChecks'][0] = 'Alle Zertifikate prüfen';
$GLOBALS['TL_LANG']['tl_monitoring']['certChecks'][1] = 'Alle Zertifikate <u>aktiver</u> Monitoring Einträge prüfen.';
$GLOBALS['TL_LANG']['tl_monitoring']['compressAll'][0] = 'Alle Tests komprimieren';
$GLOBALS['TL_LANG']['tl_monitoring']['compressAll'][1] = 'Alle Tests <u>aktiver</u> Monitoring Einträge komprimieren.';
$GLOBALS['TL_LANG']['tl_monitoring']['scanClientWorkOffAll'][0] = 'Alle Client-Daten abarbeiten';
$GLOBALS['TL_LANG']['tl_monitoring']['scanClientWorkOffAll'][1] = 'Alle Client-Daten <u>aktiver</u> Monitoring Einträge abarbeiten.';

$GLOBALS['TL_LANG']['tl_monitoring']['navigateToMonitoringResponseTimeGraph'][0] = 'Antwortzeiten anzeigen';
$GLOBALS['TL_LANG']['tl_monitoring']['navigateToMonitoringResponseTimeGraph'][1] = 'Antwortzeiten für aktuelle Filterung anzeigen.';
$GLOBALS['TL_LANG']['tl_monitoring']['navigateToMonitoringTimeline'][0] = 'Zeitleisten anzeigen';
$GLOBALS['TL_LANG']['tl_monitoring']['navigateToMonitoringTimeline'][1] = 'Zeitleisten für aktuelle Filterung anzeigen.';

$GLOBALS['TL_LANG']['tl_monitoring']['certCheck'][0] = 'Zertifikat prüfen';
$GLOBALS['TL_LANG']['tl_monitoring']['certCheck'][1] = 'Zertifikat für den Monitoring Eintrag mit der ID %s prüfen.';

$GLOBALS['TL_LANG']['tl_monitoring']['cert_legend'] = 'Zertifikatsprüfung';

if ('BE' === TL_MODE && 'monitoring' === \Contao\Input::get('do') && empty(\Contao\Input::get('act'))) {
    $GLOBALS['TL_LANG']['tl_monitoring']['phpVersion'][0] = 'PHP';
    $GLOBALS['TL_LANG']['tl_monitoring']['contaoVersion'][0] = 'Contao';
    $GLOBALS['TL_LANG']['tl_monitoring']['contaoMaintenance'][0] = 'Wartung';
    $GLOBALS['TL_LANG']['tl_monitoring']['quotaUsage'][0] = 'belegt';
    $GLOBALS['TL_LANG']['tl_monitoring']['certDatesOfExpiry'][0] = 'SSL';
    $GLOBALS['TL_LANG']['tl_monitoring']['last_test_date'][0] = 'Test';
    $GLOBALS['TL_LANG']['tl_monitoring']['last_test_status'][0] = 'Status';
}
