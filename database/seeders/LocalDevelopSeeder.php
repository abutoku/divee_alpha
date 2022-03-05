<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocalDevelopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Profile::factory(2)->create([
            'card_rank' => 'Pro',
            'dive_count' =>5000,
        ]);

        \App\Models\Profile::factory(6)->create([
            'card_rank' => 'DM',
        ]);

        \App\Models\Profile::factory(10)->create([
            'card_rank' => 'MSD',
        ]);

        \App\Models\Profile::factory(8)->create([
            'card_rank' => 'AOW',
        ]);

        \App\Models\Profile::factory(4)->create([
            'card_rank' => 'OW',
        ]);

    }
}
