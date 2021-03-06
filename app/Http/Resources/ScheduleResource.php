<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helper\Helper;
use Illuminate\Support\Facades\Log;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->weekly_recurrence === 'none') {
            return [
                'id' => $this->id,
                'groupId' => 'schedules',
                'title' => 'Schedule ' . $this->id,
                'display' => 'background',
                'start' => $this->scheduled_from . 'T' . $this->start_time,
                'end' => $this->scheduled_from . 'T' . $this->end_time,
            ];
        }

        Log::critical('In 2016, the last week is odd (53. week), which is followed by another odd week (1. week). This means in 2027, the "every other week" rule for the rrule plugin no longer works.');

        return [
            'id' => $this->id,
            'groupId' => 'schedules',
            'title' => 'Schedule ' . $this->id,
            'display' => 'background',
            'duration' => Helper::getTimeDiff($this->start_time, $this->end_time),
            'rrule' => [
                'freq' => 'weekly',
                'interval' => $this->weekly_recurrence === 'always' ? 1 : 2,
                'dtstart' => Helper::shiftToOddOrEvenWeek(
                    Helper::getClosestDateOfAWeekday(
                        $this->day_of_week,
                        $this->scheduled_from,
                    ), $this->weekly_recurrence
                ) . 'T' . $this->start_time,
                'until' => $this->scheduled_till ?? '2027-01-01',
            ],
        ];
    }
}
