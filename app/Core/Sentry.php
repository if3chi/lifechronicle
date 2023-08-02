<?php

declare(strict_types=1);

namespace App\Core;

use Closure;
use Illuminate\Support\Facades\Log;

final class Sentry
{
    public function run(Closure $callback)
    {
        try {
            return $callback();
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
