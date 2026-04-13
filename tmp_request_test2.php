<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$request = Illuminate\Http\Request::create('/admin/users', 'GET', ['status' => 'Pending Verification']);
$response = $app->handle($request);
$content = $response->getContent();
$matches = [];
preg_match_all('/<tr class="hover:bg-slate-50\/80 transition-colors group"/', $content, $matches);
echo count($matches[0]) . PHP_EOL;
if (strpos($content, 'Pending Verification') !== false) {
        echo 'pending present' . PHP_EOL;
}
