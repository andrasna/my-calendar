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
            'start_time' => '08:00:00',
            'end_time' => '10:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-01-01',
            'day_of_week' => 'Monday',
            'weekly_recurrence' => 'onEven',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-01-01',
            'day_of_week' => 'Wednesday',
            'weekly_recurrence' => 'onOdd',
            'start_time' => '12:00:00',
            'end_time' => '16:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-01-01',
            'day_of_week' => 'Friday',
            'weekly_recurrence' => 'always',
            'start_time' => '10:00:00',
            'end_time' => '16:00:00',
        ]);

        Schedule::create([
            'scheduled_from' => '2021-06-01',
            'scheduled_till' => '2021-11-30',
            'day_of_week' => 'Thursday',
            'weekly_recurrence' => 'always',
            'start_time' => '16:00:00',
            'end_time' => '20:00:00',
        ]);
    }
}
