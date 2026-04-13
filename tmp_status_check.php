<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$users = App\Models\User::select('status', \DB::raw('count(*) as total'))->groupBy('status')->get();
foreach ($users as $u) {
    echo $u->status . ': ' . $u->total . PHP_EOL;
}
