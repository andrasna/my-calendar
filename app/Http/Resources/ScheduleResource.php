<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'startTime' => $this->start_time,
            'endTime' => $this->end_time,
            'daysOfWeek' => [$this->day_of_week],
        ];
    }
}
