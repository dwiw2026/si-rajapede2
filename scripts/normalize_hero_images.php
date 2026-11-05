<?php

// Standalone script to normalize hero image paths in DB
// Run: php scripts/normalize_hero_images.php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Hero;

echo "Starting hero image normalization...\n";

$heroes = Hero::all();
$changed = 0;
$skipped = 0;
$errors = 0;

foreach ($heroes as $hero) {
    $old = $hero->image;
    if (empty($old)) {
        $skipped++;
        continue;
    }

    $image = trim($old);

    // Skip absolute URLs
    if (preg_match('#^https?://#i', $image)) {
        $skipped++;
        continue;
    }

    // Remove common prefixes
    $image = preg_replace('#^(/?)(public/|storage/|public/storage/)#i', '', $image);

    // If path contains hero_images, keep from that segment
    $pos = stripos($image, 'hero_images');
    if ($pos !== false) {
        $image = substr($image, $pos);
    }

    // Ensure it starts with hero_images/
    if (!preg_match('#^hero_images/#i', $image)) {
        $image = 'hero_images/' . basename($image);
    }

    $image = str_replace('\\', '/', $image);

    if ($image !== $old) {
        try {
            $hero->image = $image;
            $hero->save();
            echo "Updated ID {$hero->id}: '{$old}' -> '{$image}'\n";
            $changed++;
        } catch (Exception $e) {
            echo "Error updating ID {$hero->id}: " . $e->getMessage() . "\n";
            $errors++;
        }
    } else {
        $skipped++;
    }
}

echo "Done. Changed: {$changed}. Skipped: {$skipped}. Errors: {$errors}.\n";

exit(0);
