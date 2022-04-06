<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocalDevelopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 管理者アカウント
        \App\Models\User::factory(1)->create([
            'name' => 'admin',
            'email'=> 'admin@admin',
            'admin' => true,
        ]);

        // デモショップ
        \App\Models\Shop::create([
            'shop_name' => 'DIVESHOP hoge',
            'logo' => 'uploads/shop_logo.png',
            'cover' => 'uploads/shop_demo.jpg',
            'url' => 'https://gsacademy.jp/',
        ]);

        $this->call(UserSeeder::class);
        $this->call(SiteSeeder::class);
        $this->call(SetdataSeeder::class);

    }
}
