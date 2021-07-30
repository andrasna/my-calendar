<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helper\Helper;

// dd(Helper::getClosestDateOfAWeekday('Monday', '2021:08:01'));

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
                'title' => 'Schedule ' . $this->id,
                'start' => $this->scheduled_from . 'T' . $this->start_time,
                'end' => $this->scheduled_from . 'T' . $this->end_time,
            ];
        }

        return [
            'id' => $this->id,
            'title' => 'Schedule ' . $this->id,
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
