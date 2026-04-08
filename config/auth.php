<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    // config/auth.php

'guards' => [
    'web' => [ // ← tambahkan ini
        'driver' => 'session',
        'provider' => 'users',
    ],

    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
    'guru' => [
        'driver' => 'session',
        'provider' => 'gurus',
    ],
    'siswa' => [
        'driver' => 'session',
        'provider' => 'users',
    ],
],

'providers' => [
    'users' => [ // ← tambahkan ini
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],

    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
    'gurus' => [
        'driver' => 'eloquent',
        'model' => App\Models\Guru::class,
    ],
    'siswas' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
],
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
