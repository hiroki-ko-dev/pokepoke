<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packs')->insert([
            [
                'id' => 1,
                'name' => '最強の遺伝子リザードン',
                'symbol' => 'A1',
                'type' => '1',
                'image_url' => 'http://localhost:810/assets/images/packs/0001_A1/charizard.jpg',
                'created_at' => '2024-12-31 09:38:20',
                'updated_at' => '2024-12-31 09:38:20',
            ],
            [
                'id' => 2,
                'name' => '最強の遺伝子ミュウツー',
                'symbol' => 'A1',
                'type' => '1',
                'image_url' => 'http://localhost:810/assets/images/packs/0001_A1/mewtwo.jpg',
                'created_at' => '2024-12-31 09:38:20',
                'updated_at' => '2024-12-31 09:38:20',
            ],
            [
                'id' => 3,
                'name' => '最強の遺伝子ピカチュウ',
                'symbol' => 'A1',
                'type' => '1',
                'image_url' => 'http://localhost:810/assets/images/packs/0001_A1/pikachu.jpg',
                'created_at' => '2024-12-31 09:38:20',
                'updated_at' => '2024-12-31 09:38:20',
            ],
            [
                'id' => 4,
                'name' => '幻のいる島',
                'symbol' => 'A1a',
                'type' => '1',
                'image_url' => 'http://localhost:810/assets/images/packs/0002_A1a/mew.jpg',
                'created_at' => '2024-12-31 09:38:20',
                'updated_at' => '2024-12-31 09:38:20',
            ],
        ]);
    }
}
