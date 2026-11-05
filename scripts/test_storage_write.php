<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Storage;

echo "Disk public root: " . config('filesystems.disks.public.root') . PHP_EOL;
try {
    $name = 'hero_images/test_cli_' . time() . '.txt';
    $ok = Storage::disk('public')->put($name, "test at " . date('c'));
    if ($ok) {
        echo "Wrote file to public disk: {$name}\n";
        echo "Exists? " . (Storage::disk('public')->exists($name) ? 'yes' : 'no') . "\n";
    } else {
        echo "Storage::put returned false\n";
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . PHP_EOL;
}

exit(0);
