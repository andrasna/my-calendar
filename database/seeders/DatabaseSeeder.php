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
            'scheduled_from' => '2021-06-08',
            'weekly_recurrence' => 'none',
            'begins_at' => '08:00:00',
            'ends_at' => '10:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-01-01',
            'day_name' => 'Monday',
            'weekly_recurrence' => 'onEven',
            'begins_at' => '10:00:00',
            'ends_at' => '12:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-01-01',
            'day_name' => 'Wednesday',
            'weekly_recurrence' => 'onOdd',
            'begins_at' => '12:00:00',
            'ends_at' => '16:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-01-01',
            'day_name' => 'Friday',
            'weekly_recurrence' => 'always',
            'begins_at' => '10:00:00',
            'ends_at' => '16:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-06-01',
            'scheduled_till' => '2021-11-30',
            'day_name' => 'Thursday',
            'weekly_recurrence' => 'always',
            'begins_at' => '16:00:00',
            'ends_at' => '20:00:00',
        ]);
    }
}
