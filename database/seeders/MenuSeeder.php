<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'nama' => 'Cappuccino Caramel',
                'harga' => 32000,
                'deskripsi' => 'Cappuccino dengan tambahan caramel yang manis',
                'kategori' => 'Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/cappuccino-caramel.jpg'
            ],
            [
                'nama' => 'Affogato',
                'harga' => 35000,
                'deskripsi' => 'Es krim vanilla dengan espresso shot',
                'kategori' => 'Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/affogato.jpg'
            ],
            [
                'nama' => 'Kopi Susu Gula Aren',
                'harga' => 27000,
                'deskripsi' => 'Kopi dengan susu dan gula aren alami',
                'kategori' => 'Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/kopi-susu-gula-aren.jpg'
            ],
            [
                'nama' => 'Matcha Latte',
                'harga' => 30000,
                'deskripsi' => 'Matcha premium dengan susu segar',
                'kategori' => 'Non-Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/matcha-latte.jpg'
            ],
            [
                'nama' => 'Espresso Hazelnut',
                'harga' => 28000,
                'deskripsi' => 'Espresso dengan rasa hazelnut yang kaya',
                'kategori' => 'Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/espresso-hazelnut.jpg'
            ],
            [
                'nama' => 'Chocolate Frappuccino',
                'harga' => 33000,
                'deskripsi' => 'Minuman dingin dengan cokelat dan whipped cream',
                'kategori' => 'Non-Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/chocolate-frappuccino.jpg'
            ],
            [
                'nama' => 'Americano',
                'harga' => 25000,
                'deskripsi' => 'Espresso dengan air panas',
                'kategori' => 'Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/americano.jpg'
            ],
            [
                'nama' => 'Latte Art',
                'harga' => 29000,
                'deskripsi' => 'Latte dengan seni latte yang indah',
                'kategori' => 'Kopi',
                'status' => 'tersedia',
                'gambar' => 'img/latte-art.jpg'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }

        echo "Seeder Menu berhasil dijalankan!\n";
        echo "Total menu yang dibuat: " . Menu::count() . "\n";
    }
} 