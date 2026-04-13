<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$request = Illuminate\Http\Request::create('/admin/users', 'GET', ['status' => 'Pending Verification']);
$response = $app->handle($request);
echo get_class($response) . "\n";
echo $response->getStatusCode() . "\n";
$content = $response->getContent();
if (strpos($content, 'Pending Verification') !== false) {
        echo "Pending visible\n";
}
if (strpos($content, 'Active Only') !== false) {
        echo "Option visible\n";
}
