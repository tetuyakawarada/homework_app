<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // シーダークラスの呼び出し
        $this->call(StateSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
