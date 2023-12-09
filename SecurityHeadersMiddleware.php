<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // These lines remove the X-Powered-By, Server, and x-turbo-charged-by headers
        // from the incoming HTTP request. This is done to minimize information exposure
        // as revealing server details and technologies may potentially aid attackers
        //in exploiting known vulnerabilities.
        $request->headers->remove('X-Powered-By');
        $request->headers->remove('Server');
        $request->headers->remove('x-turbo-charged-by');

        // Add security headers
        // It prevents the web page from being embedded within a frame, mitigating clickjacking attacks.
        $response->headers->set('X-Frame-Options', 'deny');
        // It prevents browsers from interpreting files as a different MIME type, reducing the risk of MIME type sniffing attacks.
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        // It controls how Flash and other plugins handle cross-domain requests.
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        // It defines how much referrer information should be included with requests.
        $response->headers->set('Referrer-Policy', 'no-referrer');
        // It controls whether a cross-origin document is allowed to request embedding of a resource.
        $response->headers->set('Cross-Origin-Embedder-Policy', 'require-corp');
        // It defines a policy for loading content on your web page, reducing the risk of XSS attacks.
        $response->headers->set('Content-Security-Policy', "default-src 'none'; style-src 'self'; form-action 'self'");

        // Add Strict-Transport-Security header for HTTPS only applications
        //This section adds the Strict-Transport-Security header only in a production environment.
        //This header instructs browsers to enforce the use of HTTPS,
        //protecting against man-in-the-middle attacks by ensuring that all communication is encrypted.
        if (config('app.env') === 'production') {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        return $response;
    }
}
