# Security Headers Middleware

Enhance the security of your Laravel web application by using the `SecurityHeadersMiddleware`. This middleware removes sensitive headers and adds security-related headers to protect against common web application vulnerabilities.

## Features

- **Header Removal:**

  - `X-Powered-By`
  - `Server`
  - `x-turbo-charged-by`

  These headers are removed to minimize information exposure.

- **Security Headers Added:**

  - `X-Frame-Options`: Denies framing to prevent clickjacking attacks.
  - `X-Content-Type-Options`: Prevents MIME type sniffing attacks.
  - `X-Permitted-Cross-Domain-Policies`: Controls cross-domain requests by Flash and other plugins.
  - `Referrer-Policy`: Defines how much referrer information is included with requests.
  - `Cross-Origin-Embedder-Policy`: Controls cross-origin document embedding.
  - `Content-Security-Policy`: Defines a policy for loading content on the web page, reducing the risk of XSS attacks.

- **Strict-Transport-Security Header:**
  - Enforced only in the production environment.
  - Instructs browsers to enforce the use of HTTPS, protecting against man-in-the-middle attacks.

## Installation

No additional installation steps are required. This middleware is included with your Laravel application.

## Usage

The middleware is automatically applied to all incoming requests. You can customize the headers or behavior by modifying the middleware class.

## Configuration

Ensure your application environment is set to `'production'` to enable the `Strict-Transport-Security` header.

```php
if (config('app.env') === 'production') {
    $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
}
```

## Note :warning:

Not all of these codes have to be from my pure work, there are many of them on the Internet that I may have done some but not limited to some modification, improvement, or modification of the appearance of the code to become readable, understandable or appropriate to the place of use.
If you have any code you think will be useful and people will use frequently in many projects do not hesitate to do a pull request to this repo.

## Let's Connect

- [Linkedin](https://www.linkedin.com/in/somarkn99/)
- [website](https://www.somar-kesen.com/)
- [facebook](https://www.facebook.com/SomarKesen)
- [instagram](https://www.instagram.com/somar_kn/)

## Hire Me :fire:

By the way, I'm available to work as freelancer, feel free to communicate with me in order to transform your project from an idea to reality.

You Can contact me for freelancer job vie email :

```
freelancer@somar-kesen.com
```

## Security

If you discover any security related issues, please email them first to contact@somar-kesen.com,
if we do not fix it within a short period of time please open a new issue describe your problem.
