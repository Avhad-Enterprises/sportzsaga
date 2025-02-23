<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Middleware\EmployeeMiddleware;
use App\Middleware\SellerMiddleware;
use App\Middleware\SuperAdminMiddleware;
use App\Filters\AuthFilter;
use App\Filters\AutoLogoutMiddleware;
use App\Filters\SuperAdminOrEmployeeFilter;
use App\Filters\SuperAdminViewMiddleware;
use App\Filters\SuperAdminViewOrEmployeeFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>> [filter_name => classname]
     *                                                     or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'seller' => SellerMiddleware::class,
        'employee' => EmployeeMiddleware::class,
        'super_admin' => SuperAdminMiddleware::class,
        'auth'     => AuthFilter::class,
        'auto_logout' => AuthFilter::class,
        'super_admin_or_employee' => SuperAdminOrEmployeeFilter::class,
        'super_admin_view' => SuperAdminViewMiddleware::class,
        'superAdminViewOrEmployee' => SuperAdminViewOrEmployeeFilter::class,
        //     'auth' => \App\filters\Auth::class,
        //     'noauth' => \App\filters\NoAuth::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    public array $globals = [
        'before' => [
            'auto_logout',
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            //'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [
        'seller' => SellerMiddleware::class,
        'employee' => EmployeeMiddleware::class,
        'super_admin' => SuperAdminMiddleware::class,
        'auth' => ['before' => ['dashboard', 'admindashboard']]
    ];
}