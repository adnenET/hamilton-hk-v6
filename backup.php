<?php
// Hamilton HK V2.3 - Backup CLI
date_default_timezone_set("Africa/Casablanca");
$root = __DIR__;
$data = $root . "/data";
$backups = $data . "/backups";
if (!is_dir($backups)) mkdir($backups, 0775, true);

$ts = date("Ymd-His");
$zipName = "backup-$ts.zip";
$zipPath = $backups . "/" . $zipName;

$zip = new ZipArchive();
if ($zip->open($zipPath, ZipArchive::CREATE) !== TRUE) { echo "ERR: cannot create zip\n"; exit(1); }

foreach (glob($data . "/*.json") as $f) {
  $zip->addFile($f, basename($f));
}
$zip->close();

// retention: keep last 30 backups
$files = glob($backups . "/backup-*.zip");
sort($files);
if (count($files) > 30) {
  $del = array_slice($files, 0, count($files)-30);
  foreach ($del as $d) @unlink($d);
}

echo "OK: $zipName\n";
?>