<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helper\Helper;

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
                'weeklyRecurrence' => $this->weekly_recurrence,
            ];
        }

        return [
            'id' => $this->id,
            'title' => 'Schedule ' . $this->id,
            'startRecur' => $this->scheduled_from,
            'endRecur' => $this->scheduled_till,
            'daysOfWeek' => [
                /**
                 * This array has a singele item.
                 * Multiple days of fullcalendar are not supported,
                 * but it expects an array.
                 */
                $this->day_of_week ?? Helper::strToDayAsNum($this->scheduled_from)
            ],
            'startTime' => $this->start_time,
            'endTime' => $this->end_time,
            'weeklyRecurrence' => $this->weekly_recurrence,
        ];
    }
}
