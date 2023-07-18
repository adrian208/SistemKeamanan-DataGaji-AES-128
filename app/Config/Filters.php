<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'isLoggedIn' => \App\Filters\LoginFilter::class,
        'filterUser' => \App\Filters\FilterUser::class,

    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            //'honeypot',
            'csrf',
            // 'invalidchars',
            // 'login',
            // 'filterUser' => [
            //     'except' => ['login/*', 'login', '/']
            // ]
        ],
        'after' => [
            // 'toolbar',
            // 'honeypot',
            // 'secureheaders',
            'filterUser' => ['except' => ['login', 'login/loginproses', 'login/keluar', 'home/index', 'admin/dashboard', 'user/edituser/*', 'user/updateusersir', 'user/updatepwd/*', 'user/updatepwd', '', 'admin/enkripsi', 'dekripsi/index', 'deskripsi/show/*', 'admin/bantuan', 'index', 'admin/download', 'download', 'admin/encrypt', 'dekripsi/decrypt', '/admin/savefile', '/admin/dekrip', '/dekripsi/decrypt_file']],
            'toolbar',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'isLoggedIn' => ['before' => [
            'admin', 'admin/dashboard', 'user/edituser/*', 'admin/enkripsi', 'dekripsi/index', 'deskripsi/show/*', 'admin/bantuan', 'admin/index', 'admin/edit/*', 'index', 'admin/download', 'download',
        ]]
    ];
}
