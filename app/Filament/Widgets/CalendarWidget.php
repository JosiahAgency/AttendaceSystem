<?php

namespace App\Filament\Widgets;

use App\Models\Sessiondata;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public function fetchEvents(array $fetchInfo): array
    {
        return Sessiondata::query()
            ->where('scheduled_date', '>=', $fetchInfo['start'])
            ->where('scheduled_date', '<=', $fetchInfo['end'])
            ->get()
            ->map(function (Sessiondata $event) {
                $startDateTime = $event->scheduled_date . 'T' . $event->start_time;
                $endDateTime = $event->scheduled_date . 'T' . $event->end_time;

                return [
                    'id' => $event->id,
                    'title' => 'Session #' . $event->id,
                    'start' => $startDateTime,
                    'end' => $endDateTime,
                ];
            })
            ->toArray();
    }
}
