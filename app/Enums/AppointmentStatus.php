<?php

namespace App\Enums;

enum AppointmentStatus: string {
    case Confirmed   = "Confirmed";
    case Cancelled   = "Cancelled";
    case Pending     = "Pending";
    case Rescheduled = "Rescheduled";
    case Completed   = "Completed";

    public static function toArray() : array {
        return [
            self::Confirmed->value   => self::Confirmed->name,
            self::Cancelled->value   => self::Cancelled->name,
            self::Pending->value     => self::Pending->name,
            self::Rescheduled->value => self::Rescheduled->name,
            self::Completed->value   => self::Completed->name,
        ];
    }
}
