<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class GenerateOpenApiSpec extends Command
{
    protected $signature = 'generate:openapi';
    protected $description = 'Generate OpenAPI spec from Laravel routes';

    public function handle()
    {
        $routes = Route::getRoutes();
        $apiRoutes = [];

        foreach ($routes as $route) {
            $uri = $route->uri();
            $methods = $route->methods();
            $action = $route->getActionName();

            if (str_starts_with($uri, 'api/')) {
                $apiRoutes[] = [
                    'path' => "/$uri",
                    'methods' => $methods,
                    'action' => $action
                ];
            }
        }

        file_put_contents(storage_path('openapi.json'), json_encode($apiRoutes, JSON_PRETTY_PRINT));
        $this->info('OpenAPI spec generated successfully.');
    }
}
