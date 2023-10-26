<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;

class RequestService
{
    /**
     * Get entity id from request with locale.
     *
     * @param Request $request
     * @return string
     */
    public function getEntityId(Request $request): string
    {
        return explode('/', $request->getRequestUri())[3];
    }
}
