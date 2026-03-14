<?php
header('Content-Type: application/json; charset=utf-8');

$allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'];
$files = [];

foreach (scandir(__DIR__) as $file) {
    if ($file === '.' || $file === '..') {
        continue;
    }

    if (!is_file(__DIR__ . DIRECTORY_SEPARATOR . $file)) {
        continue;
    }

    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($extension, $allowed, true)) {
        continue;
    }

    $files[] = $file;
}

natcasesort($files);

echo json_encode(array_values($files), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
