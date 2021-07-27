<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'scheduled_from' => '2021-06-01',
            'scheduled_till' => '2021-11-30',
            'day_name' => 'Thursday',
            'active_week' => 'all',
            'begins_at' => '16:00:00',
            'ends_at' => '20:00:00',
        ]);
    }
}
