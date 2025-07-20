<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasSidebarItems
{
    public function buildSidebarItems()
    {
        $guard = 'customer';

        if (!Auth::guard($guard)->check()) {
            return [
                [
                    'name' => 'Home',
                    'icon' => 'house',
                    'route' => url('/'),
                ],
                [
                    'name' => 'Login',
                    'icon' => 'person',
                    'route' => route('customer.login'),
                ],
            ];
        }

        $userId = Auth::guard($guard)->id();

        return [
            [
                'name' => 'Home',
                'icon' => 'house',
                'route' => route('customer.pinet.home', [
                    'hash' => hash('sha256', env('CUSTOMER_URL_SECRET') . $userId)
                ]),
            ],
            [
                'name' => 'Kategori',
                'icon' => 'grid',
                'route' => '#', // Dikosongkan/dinonaktifkan sementara
            ],
            [
                'name' => 'Produk',
                'icon' => 'box',
                'route' => '#', // Dikosongkan juga
            ],
            [
                'name' => 'Notif',
                'icon' => 'bell',
                'route' => '#', // Dikosongkan juga
            ],
            [
                'name' => 'Logout',
                'icon' => 'box-arrow-right',
                'route' => route('customer.logout'),
                'is_logout' => true,
            ],
        ];
    }
}
