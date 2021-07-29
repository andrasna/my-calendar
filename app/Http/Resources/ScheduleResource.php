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
        return [
            'id' => $this->id,
            'title' => 'Schedule ' . $this->id,
            'startRecur' => $this->scheduled_from,
            'endRecur' => $this->scheduled_till,
            'weeklyRecurrence' => $this->weekly_recurrence,
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
        ];
    }
}
