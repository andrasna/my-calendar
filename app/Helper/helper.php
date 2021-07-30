<?php

namespace App\Helper;
use DateTime;

class Helper
{
    public static function getTimeDiff($time1, $time2) {
        return (new DateTime($time1))
            ->diff(new DateTime($time2))
            ->format('%H:%I:%S');
    }

    public static function isOddWeek($date) {
        return date("W", strtotime($date)) % 2 === 1;
    }

    public static function isEvenWeek($date) {
        return date("W", strtotime($date)) % 2 === 0;
    }

    public static function shiftWeek($date) {
        return (new DateTime($date))->modify('+1 week')->format('Y-m-d');
    }

    public static function shiftToOddOrEvenWeek($date, $weeklyRecurrence) {
        switch ($weeklyRecurrence) {
            case 'onOdd':
                return self::isOddWeek($date)
                    ? $date
                    : self::shiftToOddOrEvenWeek(self::shiftWeek($date), $weeklyRecurrence);
                break;
            case 'onEven':
                return self::isEvenWeek($date)
                    ? $date
                    : self::shiftToOddOrEvenWeek(self::shiftWeek($date), $weeklyRecurrence);
                break;
            default:
                return $date;
        }
    }

    public static function getClosestDateOfAWeekday($weekday, $startingFrom) {
        return (new DateTime($startingFrom))
            ->modify('next ' . $weekday)
            ->format('Y-m-d');
    }
}
