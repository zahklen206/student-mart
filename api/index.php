<?php

// Pastikan direktori sementara di /tmp tersedia untuk Vercel Serverless
$tmpDirs = [
    '/tmp/views',
    '/tmp/storage',
    '/tmp/storage/framework',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Salin database SQLite yang sudah di-seed ke /tmp agar dapat dibaca dan ditulis oleh SQLite
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';

if (file_exists($sourceDb) && !file_exists($targetDb)) {
    @copy($sourceDb, $targetDb);
} elseif (!file_exists($targetDb)) {
    @touch($targetDb);
}

// Teruskan seluruh request ke public/index.php Laravel
require __DIR__ . '/../public/index.php';
