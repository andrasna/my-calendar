<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Schedule;
use App\Models\Appointment;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\AppointmentResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/schedules', function () {
    return ScheduleResource::collection(Schedule::all([
        'id',
        'scheduled_from',
        'scheduled_till',
        'day_of_week',
        'weekly_recurrence',
        'start_time',
        'end_time'
    ]));
});

Route::get('/appointments', function () {
    return AppointmentResource::collection(Appointment::all([
        'id',
        'start_date',
        'end_date'
    ]));
});

Route::post('/appointments', function () {
    // Check if date can be saved.
    return [
        'isDateSaved' => true,
    ];
});


