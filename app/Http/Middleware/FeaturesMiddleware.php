<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Laravel\Pennant\Feature;
use Symfony\Component\HttpFoundation\Response;

class FeaturesMiddleware
{
    /**
     * @throws AuthorizationException
     */
    public function handle(Request $request, Closure $next, string...$features): Response
    {
        foreach ($features as $feature) {
            if (Feature::for($request->user())->inactive($feature)) {
                $this->unauthorized();
            }
        }

        return $next($request);
    }

    /**
     * @throws AuthorizationException
     */
    private function unauthorized()
    {
        throw new AuthorizationException(
            'Unauthorized.',
        );
    }
}
